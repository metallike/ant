<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL\Field\Flag;

class PrimaryKey extends Flag
{

    public function process(mixed $data): mixed
    {
        return '';
    }
}