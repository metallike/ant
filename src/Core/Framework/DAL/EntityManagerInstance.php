<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL;

use Ant\Core\Framework\DAL\Exception\ConstraintFlagViolationException;
use Ant\Core\Framework\DAL\Exception\InvalidEntityException;
use Ant\Core\Framework\DAL\Exception\UnexpectedFieldFlagException;
use Ant\Core\Framework\DAL\Field\Flag\ConstraintFlagInterface;
use Ant\Core\Framework\DAL\Field\Flag\DataManipulationFlagInterface;
use Ant\Core\Framework\DAL\Search\Criteria;
use Ant\Core\Framework\Uuid\Uuid;
use Doctrine\DBAL\Exception;

class EntityManagerInstance
{
    private EntityDefinition $definition;
    private Entity $entity;
    private bool $hasId = false;
    private Criteria $criteria;
    private Connection $connection;

    public function __construct(string $definition, Connection $connection)
    {
        $this->definition = new $definition();
        $this->connection = $connection;
    }

    /**
     * @param Entity $entity
     *
     * @return Entity
     * @throws ConstraintFlagViolationException
     * @throws Exception
     * @throws InvalidEntityException
     * @throws UnexpectedFieldFlagException
     */
    public function create(Entity $entity): Entity
    {
        $this->entity = $entity;

        $this->validateEntity($entity, $this->definition);

        // check if the entity has an ID field
        // if ID is not provided, set a random ID
        if (EntityDefinition::hasIdField($entity)) {
            $this->hasId = true;

            if (null === $entity->getId()) {
                $entity->setId(Uuid::randomBytes());
            }
        }

        // set the createdAt field to the current time
        $entity->setCreatedAt(new \DateTime());

        // validate and set all entity values
        $qb = $this->connection->getConnection()->createQueryBuilder();
        $insert = $qb->insert($this->definition->getEntityName());

        // get all properties from entity class
        $properties = $this->propertiesToArray($entity);

        // get an array of all fields of the entity definition
        //$fields = $this->definition->getAllFields()->getElements();
        $fields = $this->definition->getAllFields();

        //dd($fields);

        $i = 0;

        /** @var Field $field */
        foreach ($fields as $field) {
            if (in_array($field->getPropertyName(), $properties)) {
                $getter = sprintf('get%s',ucfirst($field->getPropertyName()));

                // validate and serialize data
                if (null !== $field->getFieldSerializer()) {
                    $serializer = $field->getFieldSerializer();
                    $serializer = new $serializer($field);

                    $serializer->validate($entity->$getter());
                }

                $value = $entity->$getter();

                // validate by flags
                foreach ($field->getFlags() as $flag) {
                    if (!in_array($flag::class, $field->getAllowedFlags())) {
                        throw new UnexpectedFieldFlagException($flag::class, $field);
                    }

                    // handle data manipulation flags like AllowEmptyString()
                    /** @var DataManipulationFlagInterface $flag */
                    if (in_array(DataManipulationFlagInterface::class, class_implements($flag))) {
                        $value = $flag->process($value);
                    }

                    // handle constraint flags like Required()
                    /** @var ConstraintFlagInterface $flag */
                    if (in_array(ConstraintFlagInterface::class, class_implements($flag))) {
                        $flagProcess = $flag->process($value, $field);

                        if ($flagProcess->isViolated()) {
                            $flagProcess->throwException();
                        }
                    }
                }

                $insert->setValue($field->getStorageName(), '?');
                $insert->setParameter($i, $value);

                $i++;
            }
        }

        $this->connection->getConnection()->executeStatement($qb->getSQL(), $qb->getParameters());

        return $entity;
    }

    public function update(Entity $entity)
    {

    }

    public function upsert(Entity $entity)
    {

    }

    public function delete(Entity $entity)
    {

    }

    public function search(Criteria $criteria)
    {
        $this->criteria = $criteria;
    }

    /**
     * @param Entity           $entity
     * @param EntityDefinition $definition
     *
     * @return void
     * @throws InvalidEntityException
     */
    private function validateEntity(Entity $entity, EntityDefinition $definition): void
    {
        if ($definition->getEntityClass() !== $entity::class) {
            throw new InvalidEntityException(sprintf(
                'Expected entity of type "%s", entity of type "%s" given',
                $definition->getEntityClass(),
                $entity::class
            ));
        }
    }

    private function propertiesToArray(Entity $entity): array
    {
        $properties = [];
        $reflectionProperties = (new \ReflectionClass($entity))->getProperties();

        foreach ($reflectionProperties as $reflectionProperty) {
            $properties[] = $reflectionProperty->getName();
        }

        return $properties;
    }
}