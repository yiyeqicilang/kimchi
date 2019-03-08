<?php namespace Qicilang\Kimchi\Method\Lotto;
use \Qicilang\Kimchi\Utils\Algorithm;

//不定位
class LTBDW extends Base
{
    public function getMName()
    {
        return '不定位';
    }

    //描述
    public function getDetail()
    {
        return [
            'total' => 11,
            'levels' => [
                '1' => [
                    'count' => 3,
                    'position' =>[0,1,2],
                ]
            ],
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep,array_keys($this->filterArr));
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $rand=rand(1,count($this->filterArr));
        return implode($this->codeSep,(array)array_rand($this->filterArr,$rand));
    }

    public function regexp($sCodes)
    {
        //格式
        if (!preg_match(sprintf('/^((0[1-9]\%s)|(1[01]\%s)){0,10}((0[1-9])|(1[01]))$/',$this->codeSep,$this->codeSep), $sCodes)) {
            return false;
        }

        //去重
        $t=explode($this->codeSep,$sCodes);
        $filterArr = $this->filterArr;

        $temp = array_filter(array_unique($t),function($v) use ($filterArr) {
            return isset($filterArr[$v]);
        });

        if(count($temp)==0){
            return false;
        }

        return count($temp) == count($t);
    }

    public function count($sCodes)
    {
        //n

        $n = count(explode($this->codeSep,$sCodes));

        return $n;
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        return count(array_intersect($numbers,explode($this->codeSep, $sCodes)));
    }

}