<?php declare(strict_types=1);

namespace Ant\Administration\Frontpage\Entity;

use Ant\Core\Framework\DAL\EntityDefinition;
use Ant\Core\Framework\DAL\Field\BoolField;
use Ant\Core\Framework\DAL\Field\StringField;
use Ant\Core\Framework\DAL\FieldCollection;

class UserDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'users';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getEntityClass(): string
    {
        return User::class;
    }

    public function getFields(): FieldCollection
    {
        return new FieldCollection(
            new StringField('name', 'name', strict: false),
            new StringField('email', 'email'),
            new BoolField('bool', 'bool')
        );
    }
}