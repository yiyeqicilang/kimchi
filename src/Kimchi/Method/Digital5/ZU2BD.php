<?php namespace Qicilang\Kimchi\Method\Digital5;
use \Qicilang\Kimchi\Utils\Algorithm;

//组选包胆
class ZU2BD extends Base
{
    //1
    public $all_count =90;

    public function getMName()
    {
        return '组选包胆';
    }

    public function getDetail()
    {
        return [
            'total' => 100,
            'levels' => [
                '1' => [
                    'count' => 2,
                    'position' =>[0,1],
                ],
            ],
        ];
    }

    public function getExample()
    {
        return '0 (0-9)';
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        return array_rand($this->zu2bd,1);
    }

    public function regexp($sCodes)
    {
        return isset($this->zu2bd[$sCodes]);
    }

    public function count($sCodes)
    {
        //枚举之和
        $n = 0;
        $temp = explode($this->codeSep,$sCodes);
        foreach($temp as $c){
            $n += $this->zu2bd[$c];
        }

        return $n;
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {

        $aCodes = explode($this->codeSep, $sCodes);

        //不包含对子
        if ($numbers[0] != $numbers[1]) {
            foreach ($aCodes as $code) {
                if (in_array($code, $numbers)) {
                    return 1;
                }
            }
        }

    }
}