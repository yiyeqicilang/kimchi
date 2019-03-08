<?php
namespace  Kimchi\Lottery;

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
            'BDW1' => \Kimchi\Method\Digital3\BDW1::class,
            'BDW2' => \Kimchi\Method\Digital3\BDW2::class,
            'DWD' => \Kimchi\Method\Digital3\DWD::class,
            'DXDS' => \Kimchi\Method\Digital3\DXDS::class,
            'HHZX_S' => \Kimchi\Method\Digital3\HHZX_S::class,
            'ZH3' => \Kimchi\Method\Digital3\ZH3::class,
            'ZU2' => \Kimchi\Method\Digital3\ZU2::class,
            'ZU2_S' => \Kimchi\Method\Digital3\ZU2_S::class,
            'ZU3BD' => \Kimchi\Method\Digital3\ZU3BD::class,
            'ZUHZ' => \Kimchi\Method\Digital3\ZUHZ::class,
            'ZUL' => \Kimchi\Method\Digital3\ZUL::class,
            'ZUL_S' => \Kimchi\Method\Digital3\ZUL_S::class,
            'ZUS' => \Kimchi\Method\Digital3\ZUS::class,
            'ZUS_S' => \Kimchi\Method\Digital3\ZUS_S::class,
            'ZX2' => \Kimchi\Method\Digital3\ZX2::class,
            'ZX2_S' => \Kimchi\Method\Digital3\ZX2_S::class,
            'ZX3' => \Kimchi\Method\Digital3\ZX3::class,
            'ZX3_S' => \Kimchi\Method\Digital3\ZX3_S::class,
            'ZXHZ' => \Kimchi\Method\Digital3\ZXHZ::class,
            'ZXKD' => \Kimchi\Method\Digital3\ZXKD::class,
        ];
    }
}