<?php
namespace Qicilang\Kimchi\Lottery;

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
            'LTZX3' => \Qicilang\Kimchi\Method\Lotto\LTZX3::class,
            'LTZX3_S' => \Qicilang\Kimchi\Method\Lotto\LTZX3_S::class,
            'LTZU3' => \Qicilang\Kimchi\Method\Lotto\LTZU3::class,
            'LTZU3_S' => \Qicilang\Kimchi\Method\Lotto\LTZU3_S::class,
            'LTDTZU3' => \Qicilang\Kimchi\Method\Lotto\LTDTZU3::class,

            //二码
            'LTZX2' => \Qicilang\Kimchi\Method\Lotto\LTZX2::class,
            'LTZX2_S' => \Qicilang\Kimchi\Method\Lotto\LTZX2_S::class,
            'LTZU2' => \Qicilang\Kimchi\Method\Lotto\LTZU2::class,
            'LTZU2_S' => \Qicilang\Kimchi\Method\Lotto\LTZU2_S::class,
            'LTDTZU2' => \Qicilang\Kimchi\Method\Lotto\LTDTZU2::class,

            //一码
            //'LTZX1' => \Qicilang\Kimchi\Method\Lotto\LTZX1::class,

            //不定位
            'LTBDW' => \Qicilang\Kimchi\Method\Lotto\LTBDW::class,

            //定位胆
            'LTDWD' => \Qicilang\Kimchi\Method\Lotto\LTDWD::class,

            //趣味型
            'LTCZW' => \Qicilang\Kimchi\Method\Lotto\LTCZW::class,
            'LTDDS' => \Qicilang\Kimchi\Method\Lotto\LTDDS::class,

            //任选复式
            'LTRX1' => \Qicilang\Kimchi\Method\Lotto\LTRX1::class,
            'LTRX2' => \Qicilang\Kimchi\Method\Lotto\LTRX2::class,
            'LTRX3' => \Qicilang\Kimchi\Method\Lotto\LTRX3::class,
            'LTRX4' => \Qicilang\Kimchi\Method\Lotto\LTRX4::class,
            'LTRX5' => \Qicilang\Kimchi\Method\Lotto\LTRX5::class,
            'LTRX6' => \Qicilang\Kimchi\Method\Lotto\LTRX6::class,
            'LTRX7' => \Qicilang\Kimchi\Method\Lotto\LTRX7::class,
            'LTRX8' => \Qicilang\Kimchi\Method\Lotto\LTRX8::class,

            //任选单式
            'LTRX1_S' => \Qicilang\Kimchi\Method\Lotto\LTRX1_S::class,
            'LTRX2_S' => \Qicilang\Kimchi\Method\Lotto\LTRX2_S::class,
            'LTRX3_S' => \Qicilang\Kimchi\Method\Lotto\LTRX3_S::class,
            'LTRX4_S' => \Qicilang\Kimchi\Method\Lotto\LTRX4_S::class,
            'LTRX5_S' => \Qicilang\Kimchi\Method\Lotto\LTRX5_S::class,
            'LTRX6_S' => \Qicilang\Kimchi\Method\Lotto\LTRX6_S::class,
            'LTRX7_S' => \Qicilang\Kimchi\Method\Lotto\LTRX7_S::class,
            'LTRX8_S' => \Qicilang\Kimchi\Method\Lotto\LTRX8_S::class,

            //任选胆拖
            'LTRXDT2' => \Qicilang\Kimchi\Method\Lotto\LTRXDT2::class,
            'LTRXDT3' => \Qicilang\Kimchi\Method\Lotto\LTRXDT3::class,
            'LTRXDT4' => \Qicilang\Kimchi\Method\Lotto\LTRXDT4::class,
            'LTRXDT5' => \Qicilang\Kimchi\Method\Lotto\LTRXDT5::class,
            'LTRXDT6' => \Qicilang\Kimchi\Method\Lotto\LTRXDT6::class,
            'LTRXDT7' => \Qicilang\Kimchi\Method\Lotto\LTRXDT7::class,
            'LTRXDT8' => \Qicilang\Kimchi\Method\Lotto\LTRXDT8::class,
        ];
    }
}