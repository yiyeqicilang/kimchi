<?php namespace Qicilang\Kimchi\Method\Digital5;
use \Qicilang\Kimchi\Utils\Algorithm;

class ZX3 extends Base
{
    public $all_count =1000;

    public function getMName()
    {
        return '直选复式';
    }

    public function getDetail()
    {
        return [
            'total' => 1000,
            'levels' => [
                '1' => [
                    'count' => 1,
                    'position' =>[0,1,2],
                ],
            ],
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep,$this->digital5_example)
            .$this->lineSep.implode($this->codeSep,$this->digital5_example)
            .$this->lineSep.implode($this->codeSep,$this->digital5_example);
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $arr=[];
        $rand=rand(1,10);
        $arr[]=implode($this->codeSep,(array)array_rand($this->filterArr,$rand));
        $rand=rand(1,10);
        $arr[]=implode($this->codeSep,(array)array_rand($this->filterArr,$rand));
        $rand=rand(1,10);
        $arr[]=implode($this->codeSep,(array)array_rand($this->filterArr,$rand));

        return implode($this->lineSep,$arr);
    }

    public function regexp($sCodes)
    {
        if( !preg_match(sprintf('/^(([0-9]\%s){0,9}[0-9])\%s(([0-9]\%s){0,9}[0-9])\%s(([0-9]\%s){0,9}[0-9])$/',$this->codeSep,$this->lineSep,$this->codeSep,$this->lineSep,$this->codeSep),$sCodes) ) return false;

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
        //n1*n2*n3
        $cnt = 1;
        $temp = explode($this->lineSep,$sCodes);

        foreach($temp as $c){
            $cnt *= count(explode($this->codeSep,$c));
        }

        return $cnt;
    }

    public function assertLevel($levelId, $sCodes, Array $numbers)
    {

        $aCodes = explode($this->lineSep, $sCodes);

        $preg = "|[" . str_replace($this->codeSep, '', $aCodes[0]) . "][" . str_replace($this->codeSep, '', $aCodes[1]) . "][" . str_replace($this->codeSep, '', $aCodes[2]) . "]|";

        if (preg_match($preg, implode("", $numbers))) {
            return 1;
        }

    }
}