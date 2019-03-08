<?php namespace Kimchi\Method\Lotto;
use \Kimchi\Utils\Algorithm;

class LTRXDT3 extends Base
{
    public function getMName()
    {
        return '任选胆托三中三';
    }

    //描述
    public function getDetail()
    {
        return [
            'total' => 165,
            'levels' => [
                '1' => [
                    'count' => 10,
                    'position' =>[0,1,2,3,4],
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
        $n=3;
        $d=1;
        $t=$n-$d;
        $cnt=count($this->filterArr);
        $rand1=$d;
        $rand2=rand($t,$cnt);

        $temp=(array)array_rand($this->filterArr,$rand1);
        $diffs=array_diff(array_keys($this->filterArr),$temp);

        if($rand2>count($diffs)) $rand2=count($diffs);

        $arr[]=implode($this->codeSep,$temp);

        $arr[]=implode($this->codeSep,(array)array_rand(array_flip($diffs),$rand2));

        return implode($this->lineSep,$arr);
    }

    public function regexp($sCodes)
    {
        if (!preg_match(sprintf('/^(((0[1-9]\%s)|(1[01]\%s)){0,6}((0[1-9])|(1[01]))\%s){1}(((0[1-9]\%s)|(1[01]\%s)){0,10}((0[1-9])|(1[01])))$/',$this->codeSep,$this->codeSep,$this->lineSep,$this->codeSep,$this->codeSep), $sCodes)) {
            return false;
        }

        $filterArr = $this->filterArr;

        $aTmp = explode($this->lineSep, $sCodes);
        $aDan = explode($this->codeSep, $aTmp[0]);
        if (count($aDan) != count(array_filter(array_unique($aDan),function($v) use($filterArr) {
                return isset($filterArr[$v]);
            }))) { //不能有重复的号码
            return false;
        }
        $aTuo = explode($this->codeSep, $aTmp[1]);
        if (count($aTuo) != count(array_filter(array_unique($aTuo),function($v) use($filterArr) {
                return isset($filterArr[$v]);
            }))) { //不能有重复的号码
            return false;
        }
        if (count($aDan) >= 3) {
            return false;
        }

        //有重复的
        if (count(array_intersect($aDan, $aTuo)) > 0) {
            return false;
        }

        return true;
    }

    public function count($sCodes)
    {
        //C(n2,3-n1)
        $aTmp = explode($this->lineSep, $sCodes);
        $aDan = explode($this->codeSep, $aTmp[0]);
        $aTuo = explode($this->codeSep, $aTmp[1]);
        return Algorithm::getCombinCount(count($aTuo), 3 - count($aDan));
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        //分别从胆码和拖码的01-11中，至少选择1个胆码和1个拖码组成一注，只要当期顺序摇出的5个开奖号码中同时包含所选的1个胆码和1个拖码，即为中奖。
        $aTmp = explode($this->lineSep, $sCodes);
        $iLen = 3;
        $aDan = explode($this->codeSep, $aTmp[0]);
        $aTuo = explode($this->codeSep, $aTmp[1]);
        $iRates=count(array_intersect($aTuo,$numbers));

        $aTuoCombins = Algorithm::getCombination($aTuo, $iLen - count($aDan));
        foreach($aTuoCombins as $v){
            if(count(array_intersect(array_merge($aDan,explode(' ',$v)),$numbers)) == $iLen){
                return Algorithm::getCombinCount($iRates, $iLen - count($aDan)); // 中奖倍数C(拖码与中奖号码相同的个数,玩法必须选择的号码个数-胆码个数)
            }
        }

        return 0;
    }

}