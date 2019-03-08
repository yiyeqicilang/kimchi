<?php
namespace Qicilang\Kimchi\Lottery;


class Digital5 extends Lottery
{
    public function getLId()
    {
        return 'digital5';
    }

    public function getMName()
    {
        return '时时彩';
    }

    public function getNumberPosition()
    {
        return [0,1,2,3,4];
    }

    /**
     * @return array
     */
    public function getMethodClasses()
    {
        return [
            //五星
            'ZH5' => \Qicilang\Kimchi\Method\Digital5\ZH5::class,
            'ZX5' => \Qicilang\Kimchi\Method\Digital5\ZX5::class,
            'ZX5_S' => \Qicilang\Kimchi\Method\Digital5\ZX5_S::class,
            'SJFC' => \Qicilang\Kimchi\Method\Digital5\SJFC::class,
            'SXBX' => \Qicilang\Kimchi\Method\Digital5\SXBX::class,
            'HSCS' => \Qicilang\Kimchi\Method\Digital5\HSCS::class,
            'YFFS' => \Qicilang\Kimchi\Method\Digital5\YFFS::class,
            'WXZU5' => \Qicilang\Kimchi\Method\Digital5\WXZU5::class,
            'WXZU10' => \Qicilang\Kimchi\Method\Digital5\WXZU10::class,
            'WXZU20' => \Qicilang\Kimchi\Method\Digital5\WXZU20::class,
            'WXZU30' => \Qicilang\Kimchi\Method\Digital5\WXZU30::class,
            'WXZU60' => \Qicilang\Kimchi\Method\Digital5\WXZU60::class,
            'WXZU120' => \Qicilang\Kimchi\Method\Digital5\WXZU120::class,

            //四星
            'ZH4' => \Qicilang\Kimchi\Method\Digital5\ZH4::class,
            'ZX4' => \Qicilang\Kimchi\Method\Digital5\ZX4::class,
            'ZX4_S' => \Qicilang\Kimchi\Method\Digital5\ZX4_S::class,
            'SXZU4' => \Qicilang\Kimchi\Method\Digital5\SXZU4::class,
            'SXZU6' => \Qicilang\Kimchi\Method\Digital5\SXZU6::class,
            'SXZU12' => \Qicilang\Kimchi\Method\Digital5\SXZU12::class,
            'SXZU24' => \Qicilang\Kimchi\Method\Digital5\SXZU24::class,

            //三星
            'HHZX_S' => \Qicilang\Kimchi\Method\Digital5\HHZX_S::class,
            'HZWS' => \Qicilang\Kimchi\Method\Digital5\HZWS::class,
            'ZH3' => \Qicilang\Kimchi\Method\Digital5\ZH3::class,
            'ZU3BD' => \Qicilang\Kimchi\Method\Digital5\ZU3BD::class,
            'ZUHZ' => \Qicilang\Kimchi\Method\Digital5\ZUHZ::class,
            'ZUL' => \Qicilang\Kimchi\Method\Digital5\ZUL::class,
            'ZUL_S' => \Qicilang\Kimchi\Method\Digital5\ZUL_S::class,
            'ZUS' => \Qicilang\Kimchi\Method\Digital5\ZUS::class,
            'ZUS_S' => \Qicilang\Kimchi\Method\Digital5\ZUS_S::class,
            'ZX3' => \Qicilang\Kimchi\Method\Digital5\ZX3::class,
            'ZX3_S' => \Qicilang\Kimchi\Method\Digital5\ZX3_S::class,
            'ZXHZ' => \Qicilang\Kimchi\Method\Digital5\ZXHZ::class,
            'ZXKD' => \Qicilang\Kimchi\Method\Digital5\ZXKD::class,
            'TS3' => \Qicilang\Kimchi\Method\Digital5\TS3::class,

            //二星
            'ZX2' => \Qicilang\Kimchi\Method\Digital5\ZX2::class,
            'ZX2_S' => \Qicilang\Kimchi\Method\Digital5\ZX2_S::class,
            'LH' => \Qicilang\Kimchi\Method\Digital5\LH::class,
            'ZU2' => \Qicilang\Kimchi\Method\Digital5\ZU2::class,
            'ZU2_S' => \Qicilang\Kimchi\Method\Digital5\ZU2_S::class,
            'ZU2BD' => \Qicilang\Kimchi\Method\Digital5\ZU2BD::class,
            'ZUHZ2' => \Qicilang\Kimchi\Method\Digital5\ZUHZ2::class,
            'ZXHZ2' => \Qicilang\Kimchi\Method\Digital5\ZXHZ2::class,
            'ZXKD2' => \Qicilang\Kimchi\Method\Digital5\ZXKD2::class,

            //一星
            //'ZX1' => \Qicilang\Kimchi\Method\Digital5\ZX1::class,

            //不定位
            'BDW1' => \Qicilang\Kimchi\Method\Digital5\BDW1::class,
            'BDW2' => \Qicilang\Kimchi\Method\Digital5\BDW2::class,
            'BDW41' => \Qicilang\Kimchi\Method\Digital5\BDW41::class,
            'BDW42' => \Qicilang\Kimchi\Method\Digital5\BDW42::class,
            'BDW52' => \Qicilang\Kimchi\Method\Digital5\BDW52::class,
            'BDW53' => \Qicilang\Kimchi\Method\Digital5\BDW53::class,

            //定位胆
            'DWD' => \Qicilang\Kimchi\Method\Digital5\DWD::class,

            //大小单双
            'DXDS' => \Qicilang\Kimchi\Method\Digital5\DXDS::class,
            'DXDS3' => \Qicilang\Kimchi\Method\Digital5\DXDS3::class,

            //任选
            'RHHZX_S' => \Qicilang\Kimchi\Method\Digital5\RHHZX_S::class,
            'RLH' => \Qicilang\Kimchi\Method\Digital5\RLH::class,
            'RSXZU4' => \Qicilang\Kimchi\Method\Digital5\RSXZU4::class,
            'RSXZU6' => \Qicilang\Kimchi\Method\Digital5\RSXZU6::class,
            'RSXZU12' => \Qicilang\Kimchi\Method\Digital5\RSXZU12::class,
            'RSXZU24' => \Qicilang\Kimchi\Method\Digital5\RSXZU24::class,
            'RZU2' => \Qicilang\Kimchi\Method\Digital5\RZU2::class,
            'RZU2_S' => \Qicilang\Kimchi\Method\Digital5\RZU2_S::class,
            'RZUHZ' => \Qicilang\Kimchi\Method\Digital5\RZUHZ::class,
            'RZUHZ2' => \Qicilang\Kimchi\Method\Digital5\RZUHZ2::class,
            'RZUL' => \Qicilang\Kimchi\Method\Digital5\RZUL::class,
            'RZUL_S' => \Qicilang\Kimchi\Method\Digital5\RZUL_S::class,
            'RZUS' => \Qicilang\Kimchi\Method\Digital5\RZUS::class,
            'RZUS_S' => \Qicilang\Kimchi\Method\Digital5\RZUS_S::class,
            'RZX2' => \Qicilang\Kimchi\Method\Digital5\RZX2::class,
            'RZX2_S' => \Qicilang\Kimchi\Method\Digital5\RZX2_S::class,
            'RZX3' => \Qicilang\Kimchi\Method\Digital5\RZX3::class,
            'RZX3_S' => \Qicilang\Kimchi\Method\Digital5\RZX3_S::class,
            'RZX4' => \Qicilang\Kimchi\Method\Digital5\RZX4::class,
            'RZX4_S' => \Qicilang\Kimchi\Method\Digital5\RZX4_S::class,
            'RZXHZ' => \Qicilang\Kimchi\Method\Digital5\RZXHZ::class,
            'RZXHZ2' => \Qicilang\Kimchi\Method\Digital5\RZXHZ2::class,
        ];
    }
}