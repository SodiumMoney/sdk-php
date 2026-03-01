<?php
declare(strict_types=1);

namespace Sodium\Sdk;

final class Addresses
{
    public static function getConfigAddress(string $network = Networks::DEFAULT): string
    {
        [$addr] = Pda::find(['config'], Networks::programId($network));
        return $addr;
    }
}
