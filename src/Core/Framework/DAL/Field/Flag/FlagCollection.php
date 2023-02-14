<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL\Field\Flag;

use Ant\Core\Framework\Structure\Collection;

final class FlagCollection extends Collection
{
    public function __construct(Flag ...$elements)
    {
        parent::__construct($elements);
    }
}