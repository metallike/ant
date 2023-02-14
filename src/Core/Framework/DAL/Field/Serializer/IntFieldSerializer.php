<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL\Field\Serializer;


use Ant\Core\Framework\DAL\Field\IntField;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;
use Symfony\Component\Validator\Constraints\Type;

class IntFieldSerializer extends FieldSerializer
{
    public function process(): ConstraintCollection
    {
        $constraintCollection = new ConstraintCollection();

        // must be of type "int"
        $constraintCollection->add(new Type('int'));

        /** @var IntField $intField */
        $intField = $this->getField();

        if (null !== $intField->getMinValue()) {
            $constraintCollection->add(
                new GreaterThanOrEqual($intField->getMinValue())
            );
        }

        if (null !== $intField->getMaxValue()) {
            $constraintCollection->add(
                new LessThanOrEqual($intField->getMaxValue())
            );
        }

        return $constraintCollection;
    }
}