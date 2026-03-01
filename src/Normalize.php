<?php
declare(strict_types=1);

namespace Sodium\Sdk;

final class Normalize
{
    public static function username(string $raw): string
    {
        $s = trim($raw);
        if (str_starts_with($s, '@')) {
            $s = substr($s, 1);
        }
        return strtolower($s);
    }
}
