<?php
declare(strict_types=1);

namespace Sodium\Sdk;

final class Networks
{
    public const DEFAULT = 'mainnet';

    /** @var array<string, array{label: string, program_id: string}> */
    public static array $networks = [
        'devnet' => [
            'label' => 'Devnet',
            'program_id' => '4qduM91VaZj9W9hRypygozjN7ZCeLPPe5veM2RhB7qgD',
        ],
        'mainnet' => [
            'label' => 'Mainnet-beta',
            'program_id' => 'FQr13NtzFwLp8ZZwR8SWfjEGC4F4MBrJDrcSZuEsv3Gx',
        ],
    ];

    public static function programId(string $network = self::DEFAULT): string
    {
        return self::$networks[$network]['program_id'];
    }

    public static function setMainnetProgramId(string $id): void
    {
        self::$networks['mainnet']['program_id'] = $id;
    }
}
