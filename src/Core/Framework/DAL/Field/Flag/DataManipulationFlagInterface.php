<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL\Field\Flag;

interface DataManipulationFlagInterface
{
    public function process(mixed $data): mixed;
}