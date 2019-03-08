<?php namespace Qicilang\Kimchi\Lottery;

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
            'EBTH' => \Qicilang\Kimchi\Method\Ks\EBTH::class,
            'EBTH_S' => \Qicilang\Kimchi\Method\Ks\EBTH_S::class,
            'EBTHDT' => \Qicilang\Kimchi\Method\Ks\EBTHDT::class,
            'ETHDX' => \Qicilang\Kimchi\Method\Ks\ETHDX::class,
            'ETHDX_S' => \Qicilang\Kimchi\Method\Ks\ETHDX_S::class,
            'ETHFX' => \Qicilang\Kimchi\Method\Ks\ETHFX::class,
            'KSHZ' => \Qicilang\Kimchi\Method\Ks\KSHZ::class,
            'SBTH' => \Qicilang\Kimchi\Method\Ks\SBTH::class,
            'SBTH_S' => \Qicilang\Kimchi\Method\Ks\SBTH_S::class,
            'SBTHDT' => \Qicilang\Kimchi\Method\Ks\SBTHDT::class,
            'SBTHHZ' => \Qicilang\Kimchi\Method\Ks\SBTHHZ::class,
            'SLTHTX' => \Qicilang\Kimchi\Method\Ks\SLTHTX::class,
            'STHDX' => \Qicilang\Kimchi\Method\Ks\STHDX::class,
            'STHTX' => \Qicilang\Kimchi\Method\Ks\STHTX::class,
        ];
    }
}