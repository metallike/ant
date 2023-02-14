<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL\Field\Serializer;

use Ant\Core\Framework\Validation\Constraint\Uuid;

class IdFieldSerializer extends FieldSerializer
{
    public function process(): ConstraintCollection
    {
        return new ConstraintCollection(
            new Uuid()
        );
    }
}