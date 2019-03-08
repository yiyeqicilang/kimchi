<?php namespace Kimchi\Method\Digital5;
use \Kimchi\Utils\Algorithm;

//5星2码不定位
class BDW52 extends Base
{
    public $all_count =45;


    public function getMName()
    {
        return '二码';
    }

    public function getDetail()
    {
        return [
            'total' => 100000,
            'levels' => [
                '1' => [
                    'count' => 14670,
                    'position' =>[0,1,2,3,4],
                ]
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

    //
    public function regexp($sCodes)
    {
        if (!preg_match(sprintf('/^(([0-9]\%s){0,9}[0-9])$/',$this->codeSep), $sCodes)) {
            return false;
        }

        $filterArr = $this->filterArr;

        $iNums = count(array_filter(array_unique(explode($this->codeSep, $sCodes)),function($v) use ($filterArr) {
            return isset($filterArr[$v]);
        }));

        if($iNums==0){
            return false;
        }

        return $iNums == count(explode($this->codeSep, $sCodes));
    }

    public function count($sCodes)
    {
        //C(n,2)
        $iNums = count(explode($this->codeSep,$sCodes));
        return Algorithm::getCombinCount($iNums,2);
    }


    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        $temp=array();
        $aCodes = explode($this->codeSep, $sCodes);
        $i = 0;
        foreach ($aCodes as $code) {
            if(isset($temp[$code])) continue;
            $temp[$code]=1;
            if (in_array($code, $numbers)) {
                $i++;
            }
        }

        if ($i >= 2) {
            return Algorithm::getCombinCount($i,2);
        }
    }

}