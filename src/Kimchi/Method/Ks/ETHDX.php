<?php namespace Kimchi\Method\Ks;
use \Kimchi\Utils\Algorithm;

//二同号单选
class ETHDX extends Base
{
    public function getMName()
    {
        return '二同号单选';
    }

    public function getDetail()
    {
        return [
            'total' => 216,
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
        return implode($this->codeSep,array_keys($this->filterArr))
            .$this->lineSep.implode($this->codeSep,array_keys($this->filterArr));
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $cnt=count($this->eth);
        $rand=rand(1,$cnt-1);
        $rand2=$cnt-$rand;

        $temp=(array)array_rand($this->eth,$rand);
        $_arr2=array_diff(array_keys($this->eth),$temp);
        $arr[]=implode($this->lineSep,$temp);
        $arr[]=implode($this->lineSep,(array)array_rand(array_flip($_arr2),$rand2));

        return implode($this->lineSep,$arr);
    }

    //格式解析
    public function resolve($codes)
    {
        $temp=explode($this->lineSep,$codes);
        $temp[0]=strtr($temp[0],array_flip($this->eth));
        return implode($this->lineSep,$temp);
    }

    //还原格式
    public function unresolve($codes)
    {
        $temp=explode($this->lineSep,$codes);
        $temp[0]=strtr($temp[0],$this->eth);
        return implode($this->lineSep,$temp);
    }

    public function regexp($sCodes)
    {
        if (!preg_match(sprintf('/^(([1-6]\%s){0,5}[1-6])\%s(([1-6]\%s){0,5}[1-6])$/',$this->codeSep,$this->lineSep,$this->codeSep), $sCodes)) {
            return false;
        }

        $filterArr = $this->eth;

        $aTmp = explode($this->lineSep, $sCodes);
        $aDan = explode($this->lineSep, $aTmp[0]);
        if (count($aDan) != count(array_filter(array_unique($aDan),function($v) use($filterArr) {
                return isset($filterArr[$v]);
            }))) { //不能有重复的号码
            return false;
        }
        $aTuo = explode($this->lineSep, $aTmp[1]);
        if (count($aTuo) != count(array_filter(array_unique($aTuo),function($v) use($filterArr) {
                return isset($filterArr[$v]);
            }))) { //不能有重复的号码
            return false;
        }

        //有重复的
        if (count(array_intersect($aDan, $aTuo)) > 0) {
            return false;
        }

        if(count($aDan)==0 || count($aTuo)==0){
            return false;
        }

        return true;
    }

    public function count($sCodes)
    {
        $aTmp = explode($this->lineSep, $sCodes);
        $aDan = explode($this->lineSep, $aTmp[0]);
        $aTuo = explode($this->lineSep, $aTmp[1]);
        return count($aTuo) *  count($aDan);
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        //二同号单选：当期开奖号码中有两个号码相同，且投注号码与当期开奖号码中两个相同号码和一个不同号码分别相符，即中奖。
        $str = Algorithm::strOrder(implode('',$numbers));

        $aTmp = explode($this->lineSep, $sCodes);
        $aDan = explode($this->lineSep, $aTmp[0]);
        $aTuo = explode($this->lineSep, $aTmp[1]);

        foreach($aDan as $d){
            foreach($aTuo as $t){
                if(Algorithm::strOrder($d.''.$d.''.$t) == $str){
                    return 1;
                }
            }
        }
    }
}