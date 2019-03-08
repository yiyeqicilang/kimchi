<?php namespace Kimchi\Method\Ks;
use \Kimchi\Utils\Algorithm;

//三不同号和值
class SBTHHZ extends Base
{
    public function getMName()
    {
        return '三不同号和值';
    }

    public function getDetail()
    {
        return [
            'total' => 216,
            'levels' => [
                '1' => [
                    'count' => 6,
                    'position' =>[0,1,2],
                ]
            ],
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep,array_keys($this->sbthhz));
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $cnt=count($this->sbthhz);
        $rand=rand(1,$cnt);
        return implode($this->lineSep,(array)array_rand($this->sbthhz,$rand));
    }

    public function regexp($sCodes)
    {
        //去重
        $t=explode($this->lineSep,$sCodes);
        $temp =array_unique($t);
        $arr = $this->sbthhz;

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
        $temp = explode($this->lineSep,$sCodes);
        foreach($temp as $c){
            $n += $this->sbthhz[$c];
        }

        return $n;
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        //没有相同号
        if( !($numbers[0] == $numbers[1] || $numbers[0] == $numbers[2] || $numbers[1]==$numbers[2]) ) {
            $val = array_sum($numbers);

            $aCodes = explode($this->lineSep, $sCodes);

            foreach ($aCodes as $code) {
                if ($code == $val) {
                    return 1;
                }
            }
        }
    }

}