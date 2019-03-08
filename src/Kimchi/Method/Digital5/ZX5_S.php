<?php namespace Qicilang\Kimchi\Method\Digital5;
use \Qicilang\Kimchi\Utils\Algorithm;

class ZX5_S extends Base
{
    // 12345,12345,12345,12345,12345,12345,
    public $all_count =100000;

    public function getMName()
    {
        return '直选单式';
    }

    public function getDetail()
    {
        return [
            'total' => 100000,
            'levels' => [
                '1' => [
                    'count' => 1,
                    'position' =>[0,1,2,3,4],
                ],
            ],
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep,[12121,22111,22222,44444]).'';
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $rand=5;
        return implode('',(array)array_rand($this->filterArr,$rand));
    }


    public function regexp($sCodes)
    {
//        if( !preg_match(sprintf('/^(([0-9]{5}\%s)*[0-9]{5})$/',$this->codeSep),$sCodes) ) return false;

        //重复号码
        $temp =explode($this->codeSep,$sCodes);
        $i = count(array_filter(array_unique($temp),function($val){
            if(!preg_match("/^[0-9]{5}$/",$val)) {
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