<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL;

use Ant\Core\Framework\DAL\Field\DateTimeField;
use Ant\Core\Framework\DAL\Field\Flag\AllowEmptyString;
use Ant\Core\Framework\DAL\Field\Flag\PrimaryKey;
use Ant\Core\Framework\DAL\Field\Flag\Required;
use Ant\Core\Framework\DAL\Field\IdField;

abstract class EntityDefinition
{
    abstract public function getEntityName(): string;

    abstract public function getEntityClass(): string;

    abstract public function getFields(): FieldCollection;

    final public function getDefaultFields(): FieldCollection
    {
        return new FieldCollection(
            new DateTimeField('created_at', 'createdAt'),
            new DateTimeField('updated_at', 'updatedAt')
        );
    }

    /**
     * Returns an array of all fields defined for the entity
     */
    final public function getAllFields(): array
    {
        $fieldCollection = [];

        if (self::hasIdField($this->getEntityClass())) {

            $fieldCollection[] = (new IdField('id', 'id'))->setFlags(new Required(), new PrimaryKey());
        }

        foreach ($this->getFields()->getElements() as $field) {
            $fieldCollection[] = $field;
        }

        foreach ($this->getDefaultFields()->getElements() as $field) {
            $fieldCollection[] = $field;
        }

        return $fieldCollection;
    }

    /**
     * Checks whether the entity implements the EntityIdTrait or not.
     *
     * @see EntityIdTrait
     *
     * @param object|string $entity
     *
     * @return bool
     */
    final static function hasIdField(object|string $entity): bool
    {
        return in_array(EntityIdTrait::class, class_uses($entity));
    }
}