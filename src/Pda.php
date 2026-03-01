<?php
declare(strict_types=1);

namespace Sodium\Sdk;

use StephenHill\Base58;

final class Pda
{
    /**
     * @param list<string> $seeds raw byte strings
     * @return array{0: string, 1: int} base58 address and bump
     */
    public static function find(array $seeds, string $programIdBase58): array
    {
        $b58 = new Base58();
        $programId = $b58->decode($programIdBase58);

        for ($bump = 255; $bump >= 0; $bump--) {
            $try = [...$seeds, chr($bump)];
            $hash = self::createProgramAddress($try, $programId);
            if (!self::isOnCurve($hash)) {
                return [$b58->encode($hash), $bump];
            }
        }

        throw new \RuntimeException('Unable to find program address');
    }

    /** @param list<string> $seeds */
    private static function createProgramAddress(array $seeds, string $programId32): string
    {
        $buffer = 'ProgramDerivedAddress';
        foreach ($seeds as $seed) {
            $buffer .= $seed;
        }
        $buffer .= $programId32;
        return hash('sha256', $buffer, true);
    }

    private static function isOnCurve(string $bytes32): bool
    {
        if (strlen($bytes32) !== 32) {
            return false;
        }
        return sodium_crypto_core_ed25519_is_valid_point($bytes32);
    }
}
