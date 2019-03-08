<?php namespace Kimchi\Method\Digital5;
use \Kimchi\Utils\Algorithm;

class ZX1 extends Base
{
    public $all_count =10;

    public function getMName()
    {
        return '直选';
    }

    public function getDetail()
    {
        return [
            'total' => 10,
            'levels' => [
                '1' => [
                    'count' => 1,
                    'position' =>[0],
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
        $arr=[];
        $rand=rand(1,10);
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
        //n
        return count(explode($this->codeSep,$sCodes));
    }

    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        $codes=explode($this->codeSep,$sCodes);
        $exists=array_flip($numbers);
        foreach($codes as $c){
            if(isset($exists[$c])){
                return 1;
            }
        }
    }
}