<?php namespace Kimchi\Method\Lotto;
use \Kimchi\Utils\Algorithm;

class LTRX7 extends Base
{
    public function getMName()
    {
        return '任选七中五';
    }

    //描述
    public function getDetail()
    {
        return [
            'total' => 330,
            'levels' => [
                '1' => [
                    'count' => 15,
                    'position' =>[0,1,2,3,4],
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
        $rand=rand(7,10);
        return implode($this->codeSep,(array)array_rand($this->filterArr,$rand));
    }


    public function regexp($sCodes)
    {
        //格式
        if (!preg_match(sprintf('/^((0[1-9]\%s)|(1[01]\%s)){0,10}((0[1-9])|(1[01]))$/',$this->codeSep,$this->codeSep), $sCodes)) {
            return false;
        }

        $filterArr= $this->filterArr;

        $aCode = explode($this->lineSep, $sCodes);
        foreach ($aCode as $sCode) {
            $t=explode($this->codeSep, $sCode);
            $iUniqueCount = count(array_filter(array_unique($t),function($v) use($filterArr) {
                return isset($filterArr[$v]);
            }));
            if ($iUniqueCount != count($t)) {
                return false;
            }
            if($iUniqueCount<7){
                return false;
            }
        }

        return true;
    }

    public function count($sCodes)
    {
        return Algorithm::getCombinCount(count(explode($this->codeSep, $sCodes)),7);
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        $len=7;
        $aCodes = explode($this->codeSep, $sCodes);
        $iRates = count(array_intersect($aCodes, $numbers));
        if ($iRates != 5) {
            return 0;
        }

        return Algorithm::getCombinCount(count($aCodes) - 5, $len - 5);
    }

}