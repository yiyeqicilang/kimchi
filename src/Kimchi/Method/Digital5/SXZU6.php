<?php namespace Kimchi\Method\Digital5;
use \Kimchi\Utils\Algorithm;

class SXZU6 extends Base
{
    public $all_count =45;

    public function getMName()
    {
        return '组选6';
    }

    public function getDetail()
    {
        return [
            'total' => 10000,
            'levels' => [
                '1' => [
                    'count' => 6,
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
        $rand=rand(2,10);
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
        //C(n,2)
        return Algorithm::getCombinCount(count(explode($this->codeSep,$sCodes)),2);
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        $str = Algorithm::strOrder(implode('', $numbers));

        $aCodes = explode($this->codeSep, $sCodes);

        $aP1 = Algorithm::getCombination($aCodes, 2);
        $aP1 = Algorithm::getRepeat($aP1, 2);

        foreach ($aP1 as $v1) {
            if ($str == Algorithm::strOrder(str_replace(' ', '', $v1)) ) {
                return 1;
            }
        }

    }

}