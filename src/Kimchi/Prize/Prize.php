<?php namespace Qicilang\Kimchi\Prize;

use Qicilang\Kimchi\Exception\PrizeException;
use \Qicilang\Kimchi\Utils\Algorithm;

//奖金 奖金组处理
class Prize
{
    public $group = '';
    public $prizes = [];
    public function __construct($group)
    {
        $this->group = $group;
        $this->prizes = require(__DIR__."/../Config/prizegroup/{$group}.php");
    }

    public function calculate()
    {

    }

    /**
     * @param $prize //奖金
     * @param $level //奖级信息
     * @param $toppoint //总代返点
     */
    public function exchangePointPrize($fPrize,$level,$fpoint)
    {
        $arr = [
            'total' => 1000,
            'levels' => [
                '1' => [
                    'count' => 54,
                    'position' =>[0,1,2],
                ]
            ],
        ];

        //算出 留水信息

        //玩法 奖金 总利润 总代返点 公司留水


    }
}