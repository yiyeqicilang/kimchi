<?php  namespace Qicilang\Kimchi\Method\Digital5;
use \Qicilang\Kimchi\Utils\Algorithm;

class HZWS extends Base
{
    public $all_count =10;


    public function getMName()
    {
        return '和值尾数';
    }

    public function getDetail()
    {
        return [
            'total' => 1000,
            'levels' => [
                '1' => [
                    'count' => 100,
                    'position' =>[0,1,2],
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

        //去重
        $temp=explode($this->codeSep,$sCodes);
        $arr = $this->filterArr;

        $iNums = count(array_filter(array_unique($temp),function($v) use ($arr) {
            return isset($arr[$v]);
        }));

        if($iNums==0){
            return false;
        }

        return $iNums == count($temp);
    }

    public function count($sCodes)
    {
        //C(n,1)
        $n = count(explode($this->codeSep,$sCodes));
        return Algorithm::getCombinCount($n,1);
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        $vals = str_split(array_sum($numbers));
        $val = array_pop($vals);

        $aCodes = explode($this->codeSep, $sCodes);

        foreach ($aCodes as $code) {
            if ($code == $val) {
                return 1;
            }
        }

    }

}