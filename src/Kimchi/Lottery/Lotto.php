<?php
namespace  Kimchi\Lottery;

class Lotto extends Lottery
{
    public function getLId()
    {
        return 'lotto';
    }

    public function getMName()
    {
        return '11选5';
    }

    public function getNumberPosition()
    {
        return [0,1,2,3,4];
    }

    public function getMethodClasses()
    {
        return [

            //三码
            'LTZX3' => \Kimchi\Method\Lotto\LTZX3::class,
            'LTZX3_S' => \Kimchi\Method\Lotto\LTZX3_S::class,
            'LTZU3' => \Kimchi\Method\Lotto\LTZU3::class,
            'LTZU3_S' => \Kimchi\Method\Lotto\LTZU3_S::class,
            'LTDTZU3' => \Kimchi\Method\Lotto\LTDTZU3::class,

            //二码
            'LTZX2' => \Kimchi\Method\Lotto\LTZX2::class,
            'LTZX2_S' => \Kimchi\Method\Lotto\LTZX2_S::class,
            'LTZU2' => \Kimchi\Method\Lotto\LTZU2::class,
            'LTZU2_S' => \Kimchi\Method\Lotto\LTZU2_S::class,
            'LTDTZU2' => \Kimchi\Method\Lotto\LTDTZU2::class,

            //一码
            //'LTZX1' => \Kimchi\Method\Lotto\LTZX1::class,

            //不定位
            'LTBDW' => \Kimchi\Method\Lotto\LTBDW::class,

            //定位胆
            'LTDWD' => \Kimchi\Method\Lotto\LTDWD::class,

            //趣味型
            'LTCZW' => \Kimchi\Method\Lotto\LTCZW::class,
            'LTDDS' => \Kimchi\Method\Lotto\LTDDS::class,

            //任选复式
            'LTRX1' => \Kimchi\Method\Lotto\LTRX1::class,
            'LTRX2' => \Kimchi\Method\Lotto\LTRX2::class,
            'LTRX3' => \Kimchi\Method\Lotto\LTRX3::class,
            'LTRX4' => \Kimchi\Method\Lotto\LTRX4::class,
            'LTRX5' => \Kimchi\Method\Lotto\LTRX5::class,
            'LTRX6' => \Kimchi\Method\Lotto\LTRX6::class,
            'LTRX7' => \Kimchi\Method\Lotto\LTRX7::class,
            'LTRX8' => \Kimchi\Method\Lotto\LTRX8::class,

            //任选单式
            'LTRX1_S' => \Kimchi\Method\Lotto\LTRX1_S::class,
            'LTRX2_S' => \Kimchi\Method\Lotto\LTRX2_S::class,
            'LTRX3_S' => \Kimchi\Method\Lotto\LTRX3_S::class,
            'LTRX4_S' => \Kimchi\Method\Lotto\LTRX4_S::class,
            'LTRX5_S' => \Kimchi\Method\Lotto\LTRX5_S::class,
            'LTRX6_S' => \Kimchi\Method\Lotto\LTRX6_S::class,
            'LTRX7_S' => \Kimchi\Method\Lotto\LTRX7_S::class,
            'LTRX8_S' => \Kimchi\Method\Lotto\LTRX8_S::class,

            //任选胆拖
            'LTRXDT2' => \Kimchi\Method\Lotto\LTRXDT2::class,
            'LTRXDT3' => \Kimchi\Method\Lotto\LTRXDT3::class,
            'LTRXDT4' => \Kimchi\Method\Lotto\LTRXDT4::class,
            'LTRXDT5' => \Kimchi\Method\Lotto\LTRXDT5::class,
            'LTRXDT6' => \Kimchi\Method\Lotto\LTRXDT6::class,
            'LTRXDT7' => \Kimchi\Method\Lotto\LTRXDT7::class,
            'LTRXDT8' => \Kimchi\Method\Lotto\LTRXDT8::class,
        ];
    }
}