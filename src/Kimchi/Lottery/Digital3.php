<?php
namespace Qicilang\Kimchi\Lottery;

class Digital3 extends Lottery
{
    public function getLId()
    {
        return 'digital3';
    }

    public function getMName()
    {
        return '时时彩3';
    }

    public function getNumberPosition()
    {
        return [0,1,2];
    }

    public function getMethodClasses()
    {
        return [
            'BDW1' => \Qicilang\Kimchi\Method\Digital3\BDW1::class,
            'BDW2' => \Qicilang\Kimchi\Method\Digital3\BDW2::class,
            'DWD' => \Qicilang\Kimchi\Method\Digital3\DWD::class,
            'DXDS' => \Qicilang\Kimchi\Method\Digital3\DXDS::class,
            'HHZX_S' => \Qicilang\Kimchi\Method\Digital3\HHZX_S::class,
            'ZH3' => \Qicilang\Kimchi\Method\Digital3\ZH3::class,
            'ZU2' => \Qicilang\Kimchi\Method\Digital3\ZU2::class,
            'ZU2_S' => \Qicilang\Kimchi\Method\Digital3\ZU2_S::class,
            'ZU3BD' => \Qicilang\Kimchi\Method\Digital3\ZU3BD::class,
            'ZUHZ' => \Qicilang\Kimchi\Method\Digital3\ZUHZ::class,
            'ZUL' => \Qicilang\Kimchi\Method\Digital3\ZUL::class,
            'ZUL_S' => \Qicilang\Kimchi\Method\Digital3\ZUL_S::class,
            'ZUS' => \Qicilang\Kimchi\Method\Digital3\ZUS::class,
            'ZUS_S' => \Qicilang\Kimchi\Method\Digital3\ZUS_S::class,
            'ZX2' => \Qicilang\Kimchi\Method\Digital3\ZX2::class,
            'ZX2_S' => \Qicilang\Kimchi\Method\Digital3\ZX2_S::class,
            'ZX3' => \Qicilang\Kimchi\Method\Digital3\ZX3::class,
            'ZX3_S' => \Qicilang\Kimchi\Method\Digital3\ZX3_S::class,
            'ZXHZ' => \Qicilang\Kimchi\Method\Digital3\ZXHZ::class,
            'ZXKD' => \Qicilang\Kimchi\Method\Digital3\ZXKD::class,
        ];
    }
}