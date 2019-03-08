<?php  namespace Kimchi\Method\Digital5;
use \Kimchi\Utils\Algorithm;

//2星直选和值
class ZXHZ2 extends Base
{
    public $all_count =100;

    public function getMName()
    {
        return '直选和值';
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
        return implode($this->codeSep,range(0,19)).'(0-19)';
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $rand=rand(1,count($this->zx2hz));
        return implode($this->codeSep,(array)array_rand($this->zx2hz,$rand));
    }

    public function regexp($sCodes)
    {
        //去重
        $t=explode($this->codeSep,$sCodes);
        $temp =array_unique($t);
        $arr = $this->zx2hz;

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
            $n += $this->zx2hz[$c];
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