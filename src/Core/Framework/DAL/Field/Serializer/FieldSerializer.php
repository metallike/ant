<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL\Field\Serializer;

use Ant\Core\Framework\DAL\Field;
use Symfony\Component\Validator\Validation;

abstract class FieldSerializer
{
    private Field $field;

    final public function __construct(Field $field)
    {
        $this->field = $field;
    }
    abstract public function process(): ConstraintCollection;

    final public function getField(): Field
    {
        return $this->field;
    }

    final public function validate($data): void
    {
        $validator = Validation::createValidator();

        if ($this->field instanceof Field\IntField) {
            //dd($this->process()->getElements());
        }

        $violations = $validator->validate($data, $this->process()->getElements());

        if (0 !== count($violations)) {
            $message = "";

            foreach ($violations as $violation) {
                $message .= $violation->getMessage() . "\n";
            }

            throw new \Exception(
                sprintf(
                    "%s \"%s\" violates the following constraints for field \"%s\" of field type \"%s\": \n%s",
                    ucfirst(get_debug_type($data)),
                    $data,
                    $this->field->getPropertyName(),
                    $this->field::class,
                    $message
                )
            );
        }
    }
}