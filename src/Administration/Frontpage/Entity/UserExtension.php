<?php declare(strict_types=1);

namespace Ant\Administration\Frontpage\Entity;

use Ant\Core\Framework\DAL\EntityExtension;

class UserExtension extends EntityExtension
{
    public function getEntityDefinition(): string
    {
        return UserDefinition::class;
    }
}