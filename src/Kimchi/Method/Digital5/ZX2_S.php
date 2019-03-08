<?php namespace Kimchi\Method\Digital5;
use \Kimchi\Utils\Algorithm;

class ZX2_S extends Base
{
    // 12,23,43,23,12,12,
    public $all_count =100;

    public function getMName()
    {
        return '直选单式';
    }

    public function getDetail()
    {
        return [
            'total' => 100,
            'levels' => [
                '1' => [
                    'count' => 1,
                    'position' =>[0,1],
                ],
            ],
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep,[12,21,22,44]).'';
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $rand=2;
        return implode('',(array)array_rand($this->filterArr,$rand));
    }

    public function regexp($sCodes)
    {
        if( !preg_match(sprintf('/^(([0-9]{2}\%s)*[0-9]{2})$/',$this->codeSep),$sCodes) ) return false;

        //重复号码
        $temp =explode($this->codeSep,$sCodes);
        $i = count(array_filter(array_unique($temp)));
        if($i != count($temp)) return false;

        return true;
    }

    public function count($sCodes)
    {
        return count(explode($this->codeSep,$sCodes));
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        $str = implode('', $numbers);
        $exists = array_flip(explode($this->codeSep, $sCodes));
        return intval(isset($exists[$str]));
    }
}