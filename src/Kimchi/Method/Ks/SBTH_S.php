<?php namespace Kimchi\Method\Ks;
use \Kimchi\Utils\Algorithm;

//二同号单选 单式
class SBTH_S extends Base
{
    public function getMName()
    {
        return '三不同号';
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
        return implode($this->codeSep,[123,231]);
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        return implode($this->codeSep,(array)array_rand($this->filterArr,3));
    }

    public function regexp($sCodes)
    {
        if (!preg_match(sprintf('/^(([1-6]{3}\%s)*[1-6]{3})$/',$this->codeSep), $sCodes)) {
            return false;
        }

        $temp=explode($this->codeSep,$sCodes);
        foreach($temp as $c){
            $t=str_split($c);
            if($t[0] == $t[1] || $t[1] == $t[2]  || $t[2] == $t[0]){
                return false;
            }
        }

        //重复号码
        $temp =explode($this->codeSep,$sCodes);
        $i = count(array_filter(array_unique($temp)));
        if($i != count($temp)) return false;

        //豹子号
        $aBaoZiCode3 = array('111', '222', '333', '444', '555', '666');
        if (count(array_intersect($aBaoZiCode3, $temp)) > 0) {
            return false;
        }

        //排除没有重复数字的
        foreach ($temp as $v) {
            if ($v[0] == $v[1] || $v[1] == $v[2] || $v[0] == $v[2]) {
                return false;
            }
        }

        return true;
    }

    public function count($sCodes)
    {
        return count(explode($this->codeSep,$sCodes));
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        if( !($numbers[0] == $numbers[1] || $numbers[0] == $numbers[2] || $numbers[1]==$numbers[2]) ) {
            //不限顺序
            $str = Algorithm::strOrder(implode('', $numbers));
            $aCodes = explode($this->codeSep, $sCodes);

            $i = 0;
            foreach ($aCodes as $code) {
                if (Algorithm::strOrder($code) === $str) {
                    $i++;
                }
            }
            return $i;
        }
    }

}