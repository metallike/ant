<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL\Field\Flag;

use Ant\Core\Framework\DAL\Exception\ConstraintFlagViolationException;
use Ant\Core\Framework\DAL\Field;

class FlagProcess
{
    private ?Field $field = null;
    private array $violations = [];
    private bool $hasViolations = false;

    public function __construct(?Field $field = null)
    {
        $this->field = $field;
    }

    public function setField(Field $field): void
    {
        $this->field = $field;
    }

    public function addViolation(string $message): void
    {
        if (!$this->hasField()) {
            throw new \RuntimeException('A field has to be defined');
        }

        $this->violations[] = $message;
        $this->hasViolations = true;
    }

    public function isViolated(): bool
    {
        return $this->hasViolations;
    }

    public function getViolations(): array
    {
        return $this->violations;
    }

    public function getField(): Field
    {
        return $this->field;
    }

    /**
     * @throws ConstraintFlagViolationException
     */
    public function throwException()
    {
        $message = "";

        foreach ($this->getViolations() as $violation) {
            $message .= $violation . "\n";
        }

        throw new ConstraintFlagViolationException(
            sprintf($message)
        );
    }

    private function hasField(): bool
    {
        if (null === $this->field) {
            return false;
        }

        return true;
    }
}