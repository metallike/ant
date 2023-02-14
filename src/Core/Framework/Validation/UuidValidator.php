<?php declare(strict_types=1);

namespace Ant\Core\Framework\Validation;

use Ant\Core\Framework\Uuid\Uuid as UuidDefinition;
use Ant\Core\Framework\Validation\Constraint\Uuid;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class UuidValidator extends ConstraintValidator
{
    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof Uuid) {
            throw new UnexpectedTypeException($constraint, Uuid::class);
        }

        if (!ctype_print($value)) {
            $value = UuidDefinition::fromBytesToHex($value);
        }

        if (!preg_match(UuidDefinition::UUID_PATTERN, $value)) {
            $this->context
                ->buildViolation($constraint->message)
                ->setParameter('{{ string }}', $value)
                ->addViolation();
        }
    }
}