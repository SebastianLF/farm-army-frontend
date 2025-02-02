<?php declare(strict_types=1);

namespace App\Repository;

class PlatformFantomRepository implements PlatformRepositoryInterface
{
    public function getPlatform(string $id): array
    {
        foreach($this->getPlatforms() as $platform) {
            if ($platform['id'] === $id) {
                return $platform;
            }
        }

        return [
            'id' => 'unknown',
            'label' => 'Unknown',
            'icon' => '/assets/platforms/unknown.png',
        ];
    }

    public function getPlatformChunks(): array
    {
        $chunks = array_map(
            fn($p) => $p['id'],
            $this->getPlatforms()
        );

        // $middleGroup = ['pancakebunny'];
        $slowGroup = [];

        $chunks = array_diff($chunks, $slowGroup);
        // $chunks = array_diff($chunks, $middleGroup);

        $chunks = array_chunk($chunks, 5);

        //$chunks[] = $slowGroup;
        // $chunks[] = $middleGroup;

        return $chunks;
    }

    /**
     * @return \string[][]
     */
    public function getPlatforms(): array
    {
        return [
            [
                'id' => 'spiritswap',
                'label' => 'SpiritSwap',
                'url' => 'https://app.spiritswap.finance/',
                'icon' => '/assets/platforms/spiritswap.png',
                'token' => 'spirit',
            ],
            [
                'id' => 'spookyswap',
                'label' => 'SpookySwap',
                'url' => 'https://spookyswap.finance/',
                'icon' => '/assets/platforms/spookyswap.png',
                'token' => 'boo',
            ],
            [
                'id' => 'liquiddriver',
                'label' => 'LiquidDriver',
                'url' => 'https://www.liquiddriver.finance/',
                'icon' => '/assets/platforms/liquiddriver.png',
                'token' => 'lqdr',
            ],
            [
                'id' => 'fbeefy',
                'label' => 'Beefy',
                'url' => 'https://fantom.beefy.finance/',
                'icon' => '/assets/platforms/beefy.png',
                'token' => 'bifi',
            ],
            [
                'id' => 'fcurve',
                'label' => 'Curve',
                'url' => 'https://ftm.curve.fi/',
                'icon' => '/assets/platforms/curve.png',
                'token' => 'crv',
            ],
            [
                'id' => 'frankenstein',
                'label' => 'Frankenstein',
                'url' => 'https://frankenstein.finance/?ref=0x898e99681C29479b86304292b03071C80A57948F',
                'icon' => '/assets/platforms/frankenstein.png',
                'token' => 'frank',
            ],
            [
                'id' => 'ester',
                'label' => 'Ester',
                'url' => 'https://app.ester.finance/',
                'icon' => '/assets/platforms/ester.png',
                'token' => 'est',
            ],
        ];
    }
}