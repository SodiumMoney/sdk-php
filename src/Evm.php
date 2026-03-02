<?php
declare(strict_types=1);

namespace Sodium\Sdk;

final class Evm
{
    public static function salt(string $platform, string $username): string
    {
        $norm = Normalize::username($username);
        return strtolower($platform) . ':' . $norm;
    }
}
