<?php namespace Kimchi\Method\Ks;
use \Kimchi\Utils\Algorithm;

//二同号复选
class ETHFX extends Base
{
    public function getMName()
    {
        return '二同号复选';
    }

    public function getDetail()
    {
        return [
            'total' => 216,
            'levels' => [
                '1' => [
                    'count' => 16,
                    'position' =>[0,1,2],
                ]
            ],
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep,$this->ethfx);
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $rand = rand(1,count($this->ethfx));
        return implode($this->lineSep,(array)array_rand($this->ethfx,$rand));
    }

    //格式解析
    public function resolve($codes)
    {
        return strtr($codes,array_flip($this->ethfx));
    }

    //还原格式
    public function unresolve($codes)
    {
        return strtr($codes,$this->ethfx);
    }

    public function regexp($sCodes)
    {
        if (!preg_match(sprintf('/^(([1-6]\%s){0,5}[1-6])$/',$this->codeSep), $sCodes)) {
            return false;
        }

        //去重
        $t=explode($this->lineSep,$sCodes);
        $temp =array_unique($t);
        $arr = $this->ethfx;

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
        return count(explode($this->lineSep,$sCodes));
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        //二同号复选：当期开奖号码中有两个号码相同，且投注号码中的两个相同号码与当期开奖号码中两个相同号码相符，即中奖；
        $temp=array_count_values($numbers);

        $aCodes = explode($this->lineSep,$sCodes);
        foreach($aCodes as $code){
            if(isset($temp[$code]) && ($temp[$code]==2 || $temp[$code]==3) ){
                return 1;
            }
        }
    }

}