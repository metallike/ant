<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL\Field\Serializer;

use Ant\Core\Framework\Structure\Collection;
use Symfony\Component\Validator\Constraint;

final class ConstraintCollection extends Collection
{
    public function __construct(Constraint ...$constraints)
    {
        parent::__construct($constraints);
    }
}