<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL\Field;

use Ant\Core\Framework\DAL\Field;

class DateTimeField extends Field
{
    public function getAllowedFlags(): ?array
    {
        return null;
    }

    public function getFieldSerializer(): ?string
    {
        return null;
    }
}