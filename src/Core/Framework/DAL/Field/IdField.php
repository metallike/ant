<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL\Field;

use Ant\Core\Framework\DAL\Field;
use Ant\Core\Framework\DAL\Field\Flag\Required;
use Ant\Core\Framework\DAL\Field\Flag\PrimaryKey;
use Ant\Core\Framework\DAL\Field\Serializer\IdFieldSerializer;

class IdField extends Field
{
    public function getAllowedFlags(): ?array
    {
        return [
            Required::class,
            PrimaryKey::class
        ];
    }

    public function getFieldSerializer(): ?string
    {
        return IdFieldSerializer::class;
    }
}