<?php namespace Kimchi\Method\Digital5;
use \Kimchi\Utils\Algorithm;

class ZX4_S extends Base
{
    // 12345,12345,12345,12345,12345,12345,
    public $all_count =10000;

    public function getMName()
    {
        return '直选单式';
    }

    public function getDetail()
    {
        return [
            'total' => 10000,
            'levels' => [
                '1' => [
                    'count' => 1,
                    'position' =>[0,1,2,3],
                ],
            ],
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep,[1212,2211,2222,4444]).'';
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $rand=4;
        return implode('',(array)array_rand($this->filterArr,$rand));
    }

    public function regexp($sCodes)
    {
//        if( !preg_match(sprintf('/^(([0-9]{4}\%s)*[0-9]{4})$/',$this->codeSep),$sCodes) ) return false;

        //重复号码
        $temp =explode($this->codeSep,$sCodes);
        $i = count(array_filter(array_unique($temp),function($val){
            if(!preg_match("/^[0-9]{4}$/",$val)) {
                return false;
            }
            return true;
        }));

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