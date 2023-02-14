<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL\Field\Serializer;

use Symfony\Component\Validator\Constraints\Email;

class EmailFieldSerializer extends FieldSerializer
{
    public function process(): ConstraintCollection
    {
        return new ConstraintCollection(
            new Email(mode: 'html5')
        );
    }
}