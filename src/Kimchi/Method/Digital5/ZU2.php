<?php namespace Qicilang\Kimchi\Method\Digital5;
use \Qicilang\Kimchi\Utils\Algorithm;

//组选2
class ZU2 extends Base
{
    public $all_count =45;

    public function getMName()
    {
        return '组选';
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
        return implode($this->codeSep,$this->digital5_example);
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $rand=rand(2,10);
        return implode($this->codeSep,(array)array_rand($this->filterArr,$rand));
    }

    public function regexp($sCodes)
    {
        $temp=explode($this->codeSep,$sCodes);
        $filterArr = $this->filterArr;

        $iNums = count(array_filter(array_unique($temp),function($v) use ($filterArr) {
            return isset($filterArr[$v]);
        }));

        if($iNums==0){
            return false;
        }

        return count($temp) == $iNums;
    }

    public function count($sCodes)
    {
        //C(n,2)

        $n = count(explode($this->codeSep,$sCodes));

        return Algorithm::getCombinCount($n,2);
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        //非对子
        if ($numbers[0] != $numbers[1]) {
            $preg = "|[" . str_replace($this->codeSep, '', $sCodes) . "]{2}|";
            if (preg_match($preg, implode("", $numbers))) {
                return 1;
            }
        }
    }
}