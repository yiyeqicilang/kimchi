<?php namespace Kimchi\Method\Digital5;
use \Kimchi\Utils\Algorithm;

//组选包胆
class ZU3BD extends Base
{
    //1
    public $all_count =486;

    public function getMName()
    {
        return '组选包胆';
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
        return '0 (0-9)';
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        return array_rand($this->zu3bd,1);
    }

    public function regexp($sCodes)
    {
        return isset($this->zu3bd[$sCodes]);
    }

    public function count($sCodes)
    {
        //枚举之和
        $n = 0;
        $temp = explode($this->codeSep,$sCodes);
        foreach($temp as $c){
            $n += $this->zu3bd[$c];
        }

        return $n;
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        $aCodes = explode($this->codeSep, $sCodes);

        if ($levelId == '1') {
            $flip = array_filter(array_count_values($numbers), function ($v) {
                return $v == 2;
            });

            //组三
            if (count($flip) == 1) {
                foreach ($aCodes as $code) {
                    if (in_array($code, $numbers)) {
                        return 1;
                    }
                }
            }
        } elseif ($levelId == '2') {
            //排除组3组6
            $flip = array_filter(array_count_values($numbers), function ($v) {
                return $v >= 2;
            });

            //组六
            if (count($flip) == 0) {
                foreach ($aCodes as $code) {
                    if (in_array($code, $numbers)) {
                        return 1;
                    }
                }
            }
        }

    }
}