<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL;

use Symfony\Component\Validator\Validator\ValidatorInterface;

class EntityManager
{
    public function __construct(
        private Connection $connection,
        private ValidatorInterface $validator
    )
    {
    }

    public function getDefinition(string $entityDefinition): EntityManagerInstance
    {
        return new EntityManagerInstance(
            $entityDefinition,
            $this->connection,
            $this->validator
        );
    }
}