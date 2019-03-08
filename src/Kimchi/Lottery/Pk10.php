<?php namespace Qicilang\Kimchi\Lottery;

class Pk10 extends Lottery
{
    public function getLId()
    {
        return 'pk10';
    }

    public function getMName()
    {
        return 'PK10';
    }

    public function getNumberPosition()
    {
        return [0,1,2,3,4,5,6,7,8,9];
    }

    public function getMethodClasses()
    {
        return [
            'PK10_DWD' => \Qicilang\Kimchi\Method\Pk10\PK10_DWD::class,
            'PK10_ZX1' => \Qicilang\Kimchi\Method\Pk10\PK10_ZX1::class,
            'PK10_ZX2' => \Qicilang\Kimchi\Method\Pk10\PK10_ZX2::class,
            'PK10_ZX2_S' => \Qicilang\Kimchi\Method\Pk10\PK10_ZX2_S::class,
            'PK10_ZX3' => \Qicilang\Kimchi\Method\Pk10\PK10_ZX3::class,
            'PK10_ZX3_S' => \Qicilang\Kimchi\Method\Pk10\PK10_ZX3_S::class,
        ];
    }
}