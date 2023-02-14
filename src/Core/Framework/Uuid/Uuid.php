<?php declare(strict_types=1);

namespace Ant\Core\Framework\Uuid;

class Uuid
{
    public const UUID_PATTERN = '/^[0-9a-f]{32}$/';

    public static function randomHex(): string
    {
        $uuid = \Ramsey\Uuid\Uuid::uuid4();

        return $uuid->getHex()->toString();
    }

    public static function randomBytes(): string
    {
        return \Ramsey\Uuid\Uuid::uuid4()->getBytes();
    }

    public static function fromBytesToHex($bytes): string
    {
        return bin2hex($bytes);
    }
}