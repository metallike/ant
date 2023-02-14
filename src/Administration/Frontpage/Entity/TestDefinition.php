<?php declare(strict_types=1);

namespace Ant\Administration\Frontpage\Entity;

use Ant\Core\Framework\DAL\EntityDefinition;
use Ant\Core\Framework\DAL\Field\BoolField;
use Ant\Core\Framework\DAL\Field\EmailField;
use Ant\Core\Framework\DAL\Field\Flag\Required;
use Ant\Core\Framework\DAL\Field\FloatField;
use Ant\Core\Framework\DAL\Field\IntField;
use Ant\Core\Framework\DAL\Field\StringField;
use Ant\Core\Framework\DAL\FieldCollection;

class TestDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'test';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getEntityClass(): string
    {
        return TestEntity::class;
    }

    public function getFields(): FieldCollection
    {
        return new FieldCollection(
            (new StringField('string', 'stringField'))->setFlags(new Required()),
            new EmailField('email', 'emailField'),
            new IntField('ganzzahl', 'intField', 13, 66),
            new FloatField('gleitkommazahl', 'floatField'),
            new BoolField('trueorfalse', 'boolField')
        );
    }
}