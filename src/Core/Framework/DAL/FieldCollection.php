<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL;

use Ant\Core\Framework\Structure\Collection;

final class FieldCollection extends Collection
{
    public function __construct(Field ...$elements)
    {
        parent::__construct($elements);
    }
}