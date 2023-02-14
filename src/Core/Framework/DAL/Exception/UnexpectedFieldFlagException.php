<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL\Exception;

use Ant\Core\Framework\DAL\Field;

class UnexpectedFieldFlagException extends \Exception
{
    public function __construct(string $unexpected, Field $field)
    {
        $supportedFlags = $field->getAllowedFlags();
        $message = "";

        foreach ($supportedFlags as $supportedFlag) {
            $message .= $supportedFlag . "\n";
        }

        parent::__construct(
            sprintf("Flag \"%s\" not supported by \"%s\"\n\nThe following flags are supported:\n%s", $unexpected,
                $field::class, $message)
        );
    }
}