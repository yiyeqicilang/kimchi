<?php  namespace Qicilang\Kimchi\Method\Digital5;
use \Qicilang\Kimchi\Utils\Algorithm;

class ZXHZ extends Base
{
    public $all_count =1000;

    public function getMName()
    {
        return '直选和值';
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
        return implode($this->codeSep,range(0,27)).'(0-27)';
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $rand=rand(1,count($this->zx3hz));
        return implode($this->codeSep,(array)array_rand($this->zx3hz,$rand));
    }

    public function regexp($sCodes)
    {
        //去重
        $t=explode($this->codeSep,$sCodes);
        $temp =array_unique($t);
        $arr = $this->zx3hz;

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
        //枚举之和
        $n = 0;
        $temp = explode($this->codeSep,$sCodes);
        foreach($temp as $c){
            $n += $this->zx3hz[$c];
        }

        return $n;
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        $val = array_sum($numbers);

        $aCodes = explode($this->codeSep, $sCodes);

        foreach ($aCodes as $code) {
            if ($code == $val) {
                return 1;
            }
        }

    }
}