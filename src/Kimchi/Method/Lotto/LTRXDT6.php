<?php namespace Kimchi\Method\Lotto;
use \Kimchi\Utils\Algorithm;

class LTRXDT6 extends Base
{
    public function getMName()
    {
        return '任选胆托六中五';
    }

    //描述
    public function getDetail()
    {
        return [
            'total' => 462,
            'levels' => [
                '1' => [
                    'count' => 6,
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
        $n=6;
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
        if (count($aDan) >= 6) {
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
        return Algorithm::getCombinCount(count($aTuo), 6 - count($aDan));
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        //中奖规则:
        //1.购买号码包括所有中奖号码:^(.*[24689].*){5}$
        //2.在满足第一个条件的情况下，购买号码胆码中至少包括的中奖号码个数等于胆码个数减($iParam-5):如果减出的结果为非正数,则表示胆码中可以不包括中奖号码
        //  "^(.*[24689].*){1,2}\|.*$" ):其中2为胆码个数:胆码为2时,至少有一个中奖号码在胆码当中,以此类推
        //只要任何一个条件不满足都不中奖

        // 中奖倍数:
        //1.先确定中奖的五个号码
        //2.除去中奖号码之后必须选择的号码个数=$iParam-5
        //3.剩下号码先从胆码中选择与中奖号码不匹配的号码:$iDanLen-$iDanMatchLen
        //4.除去上面选择的号码之后剩下必须选择的个数为:$iParam-5-($iDanLen-$iDanMatchLen)=n
        //5.最后可选择的号码个数:$iTuoLen-$iRates=m
        //6.中奖倍数:C(m,n)

        $iParam=6;
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