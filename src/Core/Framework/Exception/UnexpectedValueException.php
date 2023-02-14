<?php declare(strict_types=1);

namespace Ant\Core\Framework\Exception;

class UnexpectedValueException extends \Exception
{
    public function __construct(string $message, mixed $value, string $expectedValue)
    {
        parent::__construct(
            sprintf('Expected argument of type "%s", "%s" given', $expectedValue, get_debug_type($value))
        );
    }
}