<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL\Field;

use Ant\Core\Framework\DAL\Field;
use Ant\Core\Framework\DAL\Field\Flag\Required;
use Ant\Core\Framework\DAL\Field\Serializer\EmailFieldSerializer;

class EmailField extends Field
{

    public function getAllowedFlags(): ?array
    {
        return [
            Required::class
        ];
    }

    public function getFieldSerializer(): ?string
    {
        return EmailFieldSerializer::class;
    }
}