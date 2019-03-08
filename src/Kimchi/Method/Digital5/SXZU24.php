<?php namespace Qicilang\Kimchi\Method\Digital5;
use \Qicilang\Kimchi\Utils\Algorithm;

class SXZU24 extends Base
{
    public $all_count =210;

    public function getMName()
    {
        return '组选24';
    }

    public function getDetail()
    {
        return [
            'total' => 10000,
            'levels' => [
                '1' => [
                    'count' => 24,
                    'position' =>[0,1,2,3],
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
        $rand=rand(4,10);
        return implode($this->codeSep,(array)array_rand($this->filterArr,$rand));
    }

    public function regexp($sCodes)
    {
        if (!preg_match(sprintf('/^(([0-9]\%s){0,9}[0-9])$/',$this->codeSep), $sCodes)) {
            return false;
        }

        $filterArr = $this->filterArr;

        //去重
        $sCodes = explode($this->lineSep, $sCodes);
        foreach($sCodes as $codes){
            $temp = explode($this->codeSep,$codes);
            if(count($temp) != count(array_filter(array_unique($temp),function($v) use($filterArr) {
                    return isset($filterArr[$v]);
                }))) return false;

            if(count($temp)==0){
                return false;
            }
        }

        return true;
    }

    public function count($sCodes)
    {
        //C(n,4)
        return Algorithm::getCombinCount(count(explode($this->codeSep,$sCodes)),4);
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        $str = Algorithm::strOrder(implode('', $numbers));

        $aCodes = explode($this->codeSep, $sCodes);

        $aP1 = Algorithm::getCombination($aCodes, 4);

        foreach ($aP1 as $v1) {
            if ($str == Algorithm::strOrder(str_replace(' ', '', $v1)) ) {
                return 1;
            }
        }
    }

}