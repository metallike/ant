<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL\Field\Flag;

class AllowEmptyString extends Flag implements DataManipulationFlagInterface
{
    public function process(mixed $data): mixed
    {
        if (null === $data) {
            return '';
        }

        return $data;
    }
}