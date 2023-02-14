<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL\Field\Serializer;

use Symfony\Component\Validator\Constraints\Type;

class BoolFieldSerializer extends FieldSerializer
{
    public function process(): ConstraintCollection
    {
        return new ConstraintCollection(
            new Type('bool')
        );
    }
}