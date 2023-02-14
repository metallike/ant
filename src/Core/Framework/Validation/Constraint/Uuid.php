<?php declare(strict_types=1);

namespace Ant\Core\Framework\Validation\Constraint;

use Ant\Core\Framework\Validation\UuidValidator;
use Symfony\Component\Validator\Constraint;

class Uuid extends Constraint
{
    public string $message = 'The string "{{ string }}" is not a valid UUID';
    public string $mode = 'strict';

    public function validatedBy(): string
    {
        return UuidValidator::class;
    }
}