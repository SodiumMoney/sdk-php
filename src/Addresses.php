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

    public static function getPaymentAddress(
        string $platform,
        string $username,
        string $network = Networks::DEFAULT
    ): string {
        $norm = Normalize::username($username);
        [$addr] = Pda::find(
            ['escrow', strtolower($platform), $norm],
            Networks::programId($network)
        );
        return $addr;
    }
}
