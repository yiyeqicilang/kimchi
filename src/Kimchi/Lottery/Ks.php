<?php
namespace  Kimchi\Lottery;

class Ks extends Lottery
{
    public function getLId()
    {
        return 'ks';
    }

    public function getMName()
    {
        return '快三';
    }

    public function getNumberPosition()
    {
        return [0,1,2];
    }

    public function getMethodClasses()
    {
        return [
            'EBTH' => \Kimchi\Method\Ks\EBTH::class,
            'EBTH_S' => \Kimchi\Method\Ks\EBTH_S::class,
            'EBTHDT' => \Kimchi\Method\Ks\EBTHDT::class,
            'ETHDX' => \Kimchi\Method\Ks\ETHDX::class,
            'ETHDX_S' => \Kimchi\Method\Ks\ETHDX_S::class,
            'ETHFX' => \Kimchi\Method\Ks\ETHFX::class,
            'KSHZ' => \Kimchi\Method\Ks\KSHZ::class,
            'SBTH' => \Kimchi\Method\Ks\SBTH::class,
            'SBTH_S' => \Kimchi\Method\Ks\SBTH_S::class,
            'SBTHDT' => \Kimchi\Method\Ks\SBTHDT::class,
            'SBTHHZ' => \Kimchi\Method\Ks\SBTHHZ::class,
            'SLTHTX' => \Kimchi\Method\Ks\SLTHTX::class,
            'STHDX' => \Kimchi\Method\Ks\STHDX::class,
            'STHTX' => \Kimchi\Method\Ks\STHTX::class,
        ];
    }
}