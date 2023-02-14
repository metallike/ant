<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL\Field;

use Ant\Core\Framework\DAL\Field;
use Ant\Core\Framework\DAL\Field\Flag\AllowEmptyString;
use Ant\Core\Framework\DAL\Field\Flag\Required;
use Ant\Core\Framework\DAL\Field\Flag\PrimaryKey;

class StringField extends Field
{
    private int $maxLength;

    public function __construct(string $storageName, string $propertyName, int $maxLength = 255, bool $strict = false)
    {
        $this->maxLength = $maxLength;

        parent::__construct($storageName, $propertyName);
    }

    public function getAllowedFlags(): ?array
    {
        return [
            AllowEmptyString::class,
            Required::class,
            PrimaryKey::class,

        ];
    }

    public function getFieldSerializer(): ?string
    {
        return null;
    }

    /**
     * @return int
     */
    public function getMaxLength(): int
    {
        return $this->maxLength;
    }
}