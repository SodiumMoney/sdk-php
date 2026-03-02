<?php
declare(strict_types=1);

namespace Sodium\Sdk;

use StephenHill\Base58;

final class Addresses
{
    public static function getConfigAddress(string $network = Networks::DEFAULT): string
    {
        [$addr] = Pda::find(['config'], Networks::programId($network));
        return $addr;
    }

    public static function getPaymentAddress(string $platform, string $username, string $network = Networks::DEFAULT): string
    {
        $norm = Normalize::username($username);
        [$addr] = Pda::find(['escrow', strtolower($platform), $norm], Networks::programId($network));
        return $addr;
    }

    public static function getIdentityAddress(string $platform, string $username, string $network = Networks::DEFAULT): string
    {
        $norm = Normalize::username($username);
        [$addr] = Pda::find(['identity', strtolower($platform), $norm], Networks::programId($network));
        return $addr;
    }

    public static function getUsedProofAddress(string $proofHash, string $network = Networks::DEFAULT): string
    {
        [$addr] = Pda::find(['used_proof', $proofHash], Networks::programId($network));
        return $addr;
    }

    public static function getLinkRequestAddress(string $usernameHash, string $walletBase58, int $slot, string $network = Networks::DEFAULT): string
    {
        $wallet = (new Base58())->decode($walletBase58);
        [$addr] = Pda::find(['link_req', $usernameHash, $wallet, pack('P', $slot)], Networks::programId($network));
        return $addr;
    }

    public static function getTelegramLinkRequestAddress(string $usernameHash, string $walletBase58, int $slot, string $network = Networks::DEFAULT): string
    {
        $wallet = (new Base58())->decode($walletBase58);
        [$addr] = Pda::find(['tg_link_req', $usernameHash, $wallet, pack('P', $slot)], Networks::programId($network));
        return $addr;
    }
}
