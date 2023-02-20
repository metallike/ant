<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL;

use Ant\Core\Framework\DAL\Field\Flag\AssociationFlagInterface;
use Ant\Core\Framework\DAL\Field\Flag\ConstraintFlagInterface;
use Ant\Core\Framework\DAL\Field\Flag\DataManipulationFlagInterface;
use Ant\Core\Framework\DAL\Field\Flag\Flag;

abstract class Field
{
    protected string $storageName;
    protected string $propertyName;
    /**
     * @var Flag[]
     */
    private array $flags = [];

    public function __construct(string $storageName, string $propertyName)
    {
        $this->storageName = $storageName;
        $this->propertyName = $propertyName;
    }

    public function getStorageName(): string
    {
        return $this->storageName;
    }

    public function getPropertyName(): string
    {
        return $this->propertyName;
    }

    /**
     * @param Flag ...$flags
     *
     * @return $this
     */
    final public function setFlags(Flag ...$flags): static
    {
        $this->flags = $flags;

        return $this;
    }

    /**
     * Returns a sorted array with the flags.
     *
     * @return array
     * @see self::sortFlags()
     */
    final public function getFlags(): array
    {
        return $this->sortFlags($this->flags);
    }

    /**
     * Returns an array of FQCNs of the flags that are allowed to this type of
     * fields.
     *
     * @return ?Flag[]
     */
    abstract public function getAllowedFlags(): ?array;

    /**
     * Returns the FQCN of the fields serializer.
     *
     * @return string
     */
    abstract public function getFieldSerializer(): ?string;

    /**
     * @param array $flags
     *
     * @return array
     */
    private function sortFlags(array $flags): array
    {
        $sorted = [];

        foreach ($flags as $flag) {
            if (in_array(DataManipulationFlagInterface::class, class_implements($flag))) {
                $sorted[0][] = $flag;
            }

            if (in_array(ConstraintFlagInterface::class, class_implements($flag))) {
                $sorted[1][] = $flag;
            }

            if (in_array(AssociationFlagInterface::class, class_implements($flag))) {
                $sorted[3][] = $flag;
            }
        }

        uksort($sorted, function($a, $b) {
            if ($a == $b) {
                return 0;
            }

            return ($a < $b) ? -1 : 1;
        });

        $sortedFlags = [];

        foreach ($sorted as $value) {
            $sortedFlags[] = $value[0];
        }

        return $sortedFlags;
    }
}