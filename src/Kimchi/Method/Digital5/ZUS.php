<?php namespace Qicilang\Kimchi\Method\Digital5;
use \Qicilang\Kimchi\Utils\Algorithm;

//组选三
class ZUS extends Base
{
    public $all_count =90;

    public function getMName()
    {
        return '组三复式';
    }

    public function getDetail()
    {
        return [
            'total' => 1000,
            'levels' => [
                '1' => [
                    'count' => 3,
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
        $rand=rand(3,10);
        return implode($this->codeSep,(array)array_rand($this->filterArr,$rand));
    }

    public function regexp($sCodes)
    {
        if (!preg_match(sprintf('/^(([0-9]\%s)*[0-9])$/',$this->codeSep), $sCodes)) {
            return false;
        }

        //去重
        $t=explode($this->codeSep,$sCodes);
        $temp =array_unique($t);
        $arr = $this->filterArr;

        $temp = array_filter($temp,function($v) use ($arr) {
            return isset($arr[$v]);
        });

        if(count($temp)==0){
            return false;
        }

        return count($temp) == count($t);
    }

    public function count($sCodes)
    {
        //C(n,2)*2

        $n = count(explode($this->codeSep,$sCodes));

        return Algorithm::getCombinCount($n,2) * 2;
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        $flip = array_filter(array_count_values($numbers), function ($v) {
            return $v == 2;
        });

        if (count($flip) == 1) {
            $preg = "|[" . str_replace($this->codeSep, '', $sCodes) . "]{3}|";
            if (preg_match($preg, implode("", $numbers))) {
                return 1;
            }
        }

    }

}