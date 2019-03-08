<?php namespace Kimchi\Method\Digital5;
use \Kimchi\Utils\Algorithm;

//三星报喜
class SXBX extends Base
{
    public $all_count =10;

    public function getMName()
    {
        return '三星报喜';
    }

    public function getDetail()
    {
        return [
            'total' => 100000,
            'levels' => [
                '1' => [
                    'count' => 856,
                    'position' =>[0,1,2,3,4],
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
        return count(explode($this->codeSep,$sCodes));
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {

        $aCodes = array_flip(explode($this->codeSep, $sCodes));

        $flip = array_filter(array_count_values($numbers), function ($v) {
            return $v >= 3;
        });

        $e = array_intersect_key($flip, $aCodes);

        $cnt = count($e);

        if ($cnt > 0) {
            return $cnt;
        }

    }

}