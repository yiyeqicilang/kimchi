<?php namespace Kimchi\Method\Digital5;
use \Kimchi\Utils\Algorithm;

//组选和值
class ZUHZ2 extends Base
{
    public $all_count =45;

    public function getMName()
    {
        return '组选和值';
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
        return implode($this->codeSep,range(1,17)).'(1-17)';
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $rand=rand(1,count($this->zu2hz));
        return implode($this->codeSep,(array)array_rand($this->zu2hz,$rand));
    }

    public function regexp($sCodes)
    {
        //去重
        $t=explode($this->codeSep,$sCodes);
        $temp =array_unique($t);
        $arr = $this->zu2hz;

        $temp = array_filter($temp,function($v) use ($arr) {
            return isset($arr[$v]);
        });

        if(count($temp)==0){
            return false;
        }

        return count($temp) == count($t);
    }

    public function count($sCodes)
    {
        //枚举之和
        $n = 0;
        $temp = explode($this->codeSep,$sCodes);
        foreach($temp as $c){
            $n += $this->zu2hz[$c];
        }

        return $n;
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {

        $val = array_sum($numbers);

        $aCodes = explode($this->codeSep, $sCodes);

        //不包含对子
        if ($numbers[0] != $numbers[1]) {
            foreach ($aCodes as $code) {
                if ($val == $code) {
                    return 1;
                }
            }
        }
    }
}