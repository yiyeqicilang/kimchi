<?php namespace Qicilang\Kimchi\Method\Ks;
use \Qicilang\Kimchi\Utils\Algorithm;

//三同号单选
class STHDX extends Base
{
    public function getMName()
    {
        return '三同号单选';
    }

    public function getDetail()
    {
        return [
            'total' => 216,
            'levels' => [
                '1' => [
                    'count' => 1,
                    'position' =>[0,1,2],
                ]
            ],
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep,$this->sth);
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $cnt=count($this->sth);
        $rand=rand(1,$cnt);
        return implode($this->lineSep,(array)array_rand($this->sth,$rand));
    }


    //格式解析
    public function resolve($codes)
    {
        return strtr($codes,array_flip($this->sth));
    }

    //还原格式
    public function unresolve($codes)
    {
        return strtr($codes,$this->sth);
    }

    public function regexp($sCodes)
    {
        if (!preg_match(sprintf('/^(([1-6]\%s){0,5}[1-6])$/',$this->codeSep), $sCodes)) {
            return false;
        }

        $t = explode($this->lineSep,$sCodes);
        $temp=array_unique($t);

        $filterArr = $this->sth;
        $nums = count(array_filter($temp, function($v) use ($filterArr) {
            return isset($filterArr[$v]);
        }));

        if($nums==0){
            return false;
        }

        if($nums != count($t)) return false;

        return true;
    }

    public function count($sCodes)
    {
        return count(explode($this->lineSep,$sCodes));
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        //三同号单选：当期开奖号码的三个号码相同，且投注号码与当期开奖号码相符，即中奖。
        $aCodes = explode($this->lineSep,$sCodes);

        //全相等
        if($numbers[0]==$numbers[1] && $numbers[1]==$numbers[2]){
            if(in_array($numbers[0],$aCodes)){
                return 1;
            }
        }
    }

}