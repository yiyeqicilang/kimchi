<?php
namespace  Kimchi\Lottery;


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
            'ZH5' => \Kimchi\Method\Digital5\ZH5::class,
            'ZX5' => \Kimchi\Method\Digital5\ZX5::class,
            'ZX5_S' => \Kimchi\Method\Digital5\ZX5_S::class,
            'SJFC' => \Kimchi\Method\Digital5\SJFC::class,
            'SXBX' => \Kimchi\Method\Digital5\SXBX::class,
            'HSCS' => \Kimchi\Method\Digital5\HSCS::class,
            'YFFS' => \Kimchi\Method\Digital5\YFFS::class,
            'WXZU5' => \Kimchi\Method\Digital5\WXZU5::class,
            'WXZU10' => \Kimchi\Method\Digital5\WXZU10::class,
            'WXZU20' => \Kimchi\Method\Digital5\WXZU20::class,
            'WXZU30' => \Kimchi\Method\Digital5\WXZU30::class,
            'WXZU60' => \Kimchi\Method\Digital5\WXZU60::class,
            'WXZU120' => \Kimchi\Method\Digital5\WXZU120::class,

            //四星
            'ZH4' => \Kimchi\Method\Digital5\ZH4::class,
            'ZX4' => \Kimchi\Method\Digital5\ZX4::class,
            'ZX4_S' => \Kimchi\Method\Digital5\ZX4_S::class,
            'SXZU4' => \Kimchi\Method\Digital5\SXZU4::class,
            'SXZU6' => \Kimchi\Method\Digital5\SXZU6::class,
            'SXZU12' => \Kimchi\Method\Digital5\SXZU12::class,
            'SXZU24' => \Kimchi\Method\Digital5\SXZU24::class,

            //三星
            'HHZX_S' => \Kimchi\Method\Digital5\HHZX_S::class,
            'HZWS' => \Kimchi\Method\Digital5\HZWS::class,
            'ZH3' => \Kimchi\Method\Digital5\ZH3::class,
            'ZU3BD' => \Kimchi\Method\Digital5\ZU3BD::class,
            'ZUHZ' => \Kimchi\Method\Digital5\ZUHZ::class,
            'ZUL' => \Kimchi\Method\Digital5\ZUL::class,
            'ZUL_S' => \Kimchi\Method\Digital5\ZUL_S::class,
            'ZUS' => \Kimchi\Method\Digital5\ZUS::class,
            'ZUS_S' => \Kimchi\Method\Digital5\ZUS_S::class,
            'ZX3' => \Kimchi\Method\Digital5\ZX3::class,
            'ZX3_S' => \Kimchi\Method\Digital5\ZX3_S::class,
            'ZXHZ' => \Kimchi\Method\Digital5\ZXHZ::class,
            'ZXKD' => \Kimchi\Method\Digital5\ZXKD::class,
            'TS3' => \Kimchi\Method\Digital5\TS3::class,

            //二星
            'ZX2' => \Kimchi\Method\Digital5\ZX2::class,
            'ZX2_S' => \Kimchi\Method\Digital5\ZX2_S::class,
            'LH' => \Kimchi\Method\Digital5\LH::class,
            'ZU2' => \Kimchi\Method\Digital5\ZU2::class,
            'ZU2_S' => \Kimchi\Method\Digital5\ZU2_S::class,
            'ZU2BD' => \Kimchi\Method\Digital5\ZU2BD::class,
            'ZUHZ2' => \Kimchi\Method\Digital5\ZUHZ2::class,
            'ZXHZ2' => \Kimchi\Method\Digital5\ZXHZ2::class,
            'ZXKD2' => \Kimchi\Method\Digital5\ZXKD2::class,

            //一星
            //'ZX1' => \Kimchi\Method\Digital5\ZX1::class,

            //不定位
            'BDW1' => \Kimchi\Method\Digital5\BDW1::class,
            'BDW2' => \Kimchi\Method\Digital5\BDW2::class,
            'BDW41' => \Kimchi\Method\Digital5\BDW41::class,
            'BDW42' => \Kimchi\Method\Digital5\BDW42::class,
            'BDW52' => \Kimchi\Method\Digital5\BDW52::class,
            'BDW53' => \Kimchi\Method\Digital5\BDW53::class,

            //定位胆
            'DWD' => \Kimchi\Method\Digital5\DWD::class,

            //大小单双
            'DXDS' => \Kimchi\Method\Digital5\DXDS::class,
            'DXDS3' => \Kimchi\Method\Digital5\DXDS3::class,

            //任选
            'RHHZX_S' => \Kimchi\Method\Digital5\RHHZX_S::class,
            'RLH' => \Kimchi\Method\Digital5\RLH::class,
            'RSXZU4' => \Kimchi\Method\Digital5\RSXZU4::class,
            'RSXZU6' => \Kimchi\Method\Digital5\RSXZU6::class,
            'RSXZU12' => \Kimchi\Method\Digital5\RSXZU12::class,
            'RSXZU24' => \Kimchi\Method\Digital5\RSXZU24::class,
            'RZU2' => \Kimchi\Method\Digital5\RZU2::class,
            'RZU2_S' => \Kimchi\Method\Digital5\RZU2_S::class,
            'RZUHZ' => \Kimchi\Method\Digital5\RZUHZ::class,
            'RZUHZ2' => \Kimchi\Method\Digital5\RZUHZ2::class,
            'RZUL' => \Kimchi\Method\Digital5\RZUL::class,
            'RZUL_S' => \Kimchi\Method\Digital5\RZUL_S::class,
            'RZUS' => \Kimchi\Method\Digital5\RZUS::class,
            'RZUS_S' => \Kimchi\Method\Digital5\RZUS_S::class,
            'RZX2' => \Kimchi\Method\Digital5\RZX2::class,
            'RZX2_S' => \Kimchi\Method\Digital5\RZX2_S::class,
            'RZX3' => \Kimchi\Method\Digital5\RZX3::class,
            'RZX3_S' => \Kimchi\Method\Digital5\RZX3_S::class,
            'RZX4' => \Kimchi\Method\Digital5\RZX4::class,
            'RZX4_S' => \Kimchi\Method\Digital5\RZX4_S::class,
            'RZXHZ' => \Kimchi\Method\Digital5\RZXHZ::class,
            'RZXHZ2' => \Kimchi\Method\Digital5\RZXHZ2::class,
        ];
    }
}