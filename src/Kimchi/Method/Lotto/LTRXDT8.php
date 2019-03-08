<?php namespace Qicilang\Kimchi\Method\Lotto;
use \Qicilang\Kimchi\Utils\Algorithm;

class LTRXDT8 extends Base
{
    public function getMName()
    {
        return '任选胆托八中五';
    }

    //描述
    public function getDetail()
    {
        return [
            'total' => 165,
            'levels' => [
                '1' => [
                    'count' => 20,
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
        $n=8;
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
        if (count($aDan) >= 8) {
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
        return Algorithm::getCombinCount(count($aTuo), 8 - count($aDan));
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        $iParam=8;
        $aCodes = explode($this->lineSep, $sCodes);

        $aDan = explode($this->codeSep, $aCodes[0]); //胆码
        $aTuo = explode($this->codeSep, $aCodes[1]); //拖码
        $iDanLen = count($aDan); //胆码个数
        $iTuoLen = count($aTuo); //拖码个数
        $iDanMatchLen = count(array_intersect($aDan, $numbers)); //胆码与中奖号码匹配次数
        $iTuoMatchLen = count(array_intersect($aTuo, $numbers)); // 拖码与中奖号码匹配次数

        if ($iTuoMatchLen + $iDanMatchLen != 5) { //所有号码与中奖号码的匹配次数不等于5:则不能中奖
            return 0;
        }
        if ($iDanLen - $iDanMatchLen > $iParam - 5) { //胆码中与开奖号码不匹配的个数不能大于:$iParam-5
            return 0;
        }

        return Algorithm::getCombinCount($iTuoLen - $iTuoMatchLen, $iParam - 5 - ($iDanLen - $iDanMatchLen));
    }

}