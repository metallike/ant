<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL\Field;

use Ant\Core\Framework\DAL\Field;
use Ant\Core\Framework\DAL\Field\Flag\Required;
use Ant\Core\Framework\DAL\Field\Flag\PrimaryKey;
use Ant\Core\Framework\DAL\Field\Serializer\IntFieldSerializer;

/**
 * A field that stores an int value.
 */
class IntField extends Field
{
    private ?int $minValue;
    private ?int $maxValue;

    public function __construct(string $storageName, string $propertyName, ?int $minValue = null, ?int $maxValue = null)
    {
        $this->minValue = $minValue;
        $this->maxValue = $maxValue;
        $this->storageName = $storageName;

        parent::__construct($storageName, $propertyName);
    }

    public function getMinValue(): ?int
    {
        return $this->minValue;
    }

    public function getMaxValue(): ?int
    {
        return $this->maxValue;
    }

    public function getAllowedFlags(): array
    {
        return [
            Required::class,
            PrimaryKey::class
        ];
    }

    public function getFieldSerializer(): string
    {
        return IntFieldSerializer::class;
    }
}