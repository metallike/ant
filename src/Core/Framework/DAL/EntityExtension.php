<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL;

abstract class EntityExtension
{
    abstract public function getEntityDefinition(): string;
}