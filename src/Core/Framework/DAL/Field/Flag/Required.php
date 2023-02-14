<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL\Field\Flag;

use Ant\Core\Framework\DAL\Field;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Validation;

class Required extends Flag implements ConstraintFlagInterface
{
    public function process(mixed $data, Field $field): FlagProcess
    {
        $flagProcess = new FlagProcess();
        $flagProcess->setField($field);

        $validator = Validation::createValidator();

        $violations = $validator->validate($data, new NotNull());

        if (0 !== count($violations)) {
            foreach ($violations as $violation) {
                $flagProcess->addViolation($violation->getMessage());
            }
        }

        return $flagProcess;
    }
}