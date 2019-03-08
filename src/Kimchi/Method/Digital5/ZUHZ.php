<?php namespace Kimchi\Method\Digital5;
use \Kimchi\Utils\Algorithm;

//组选和值
class ZUHZ extends Base
{
    public $all_count =210;

    public function getMName()
    {
        return '组选和值';
    }

    public function getDetail()
    {
        return [
            'total' => 1000,
            'levels' => [
                '1' => [
                    'count' => 3,
                    'position' =>[0,1,2],
                    'name' => '组三',
                ],
                '2' => [
                    'count' => 6,
                    'position' =>[0,1,2],
                    'name' => '组六',
                ],
            ],
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep,range(1,26)).'(1-26)';
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $rand=rand(1,count($this->zu3hz));
        return implode($this->codeSep,(array)array_rand($this->zu3hz,$rand));
    }

    public function regexp($sCodes)
    {
        //去重
        $t=explode($this->codeSep,$sCodes);
        $temp =array_unique($t);
        $arr = $this->zu3hz;

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
            $n += $this->zu3hz[$c];
        }

        return $n;
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {

        $val = array_sum($numbers);

        $aCodes = explode($this->codeSep, $sCodes);

        if ($levelId == '1') {
            $flip = array_filter(array_count_values($numbers), function ($v) {
                return $v == 2;
            });

            //组三
            if (count($flip) == 1) {
                foreach ($aCodes as $code) {
                    if ($val == $code) {
                        return 1;
                    }
                }
            }
        } elseif ($levelId == '2') {
            $flip = array_filter(array_count_values($numbers), function ($v) {
                return $v >= 2;
            });

            //组六
            if (count($flip) == 0) {
                foreach ($aCodes as $code) {
                    if ($val == $code) {
                        return 1;
                    }
                }
            }
        }

    }
}