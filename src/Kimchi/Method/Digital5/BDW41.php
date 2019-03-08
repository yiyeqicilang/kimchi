<?php namespace Qicilang\Kimchi\Method\Digital5;
use \Qicilang\Kimchi\Utils\Algorithm;

//4星1码不定位
class BDW41 extends Base
{
    public $all_count =10;

    public function getMName()
    {
        return '一码';
    }

    public function getDetail()
    {
        return [
            'total' => 10000,
            '1' => [
                'count' => 3439,
                'position' =>[0,1,2,3],
            ]
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep,$this->digital5_example);
    }

    public function randomCodes()
    {
        $rand=rand(1,10);
        return implode($this->codeSep,(array)array_rand($this->filterArr,$rand));
    }

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
        //C(n,1)
        $iNums = count(explode($this->codeSep,$sCodes));
        return Algorithm::getCombinCount($iNums,1);
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        $temp =array();
        $nums = array_count_values ($numbers);

        $aCodes = explode($this->codeSep, $sCodes);
        $i = 0;
        foreach ($aCodes as $code) {
            if(isset($temp[$code])) continue;
            $temp[$code]=1;
            if (isset($nums[$code]) && $nums[$code]>=1) {
                $i++;
            }
        }

        return $i;
    }

}