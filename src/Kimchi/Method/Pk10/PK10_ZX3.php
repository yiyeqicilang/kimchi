<?php namespace Kimchi\Method\Pk10;
use \Kimchi\Utils\Algorithm;

//直选3
class PK10_ZX3 extends Base
{
    public function getMName()
    {
        return '直选复式';
    }

    //描述
    public function getDetail()
    {
        return [
            'total' => 720,
            'levels' => [
                '1' => [
                    'count' => 1,
                    'position' =>[0],
                ]
            ],
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep,array_keys($this->filterArr))
            .$this->lineSep.implode($this->codeSep,array_keys($this->filterArr))
            .$this->lineSep.implode($this->codeSep,array_keys($this->filterArr));
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $arr=[];
        $rand=rand(1,10);
        $arr[]=implode($this->codeSep,(array)array_rand($this->filterArr,$rand));
        $rand=rand(1,10);
        $arr[]=implode($this->codeSep,(array)array_rand($this->filterArr,$rand));
        $rand=rand(1,10);
        $arr[]=implode($this->codeSep,(array)array_rand($this->filterArr,$rand));

        return implode($this->lineSep,$arr);
    }

    public function regexp($sCodes)
    {
        //格式
        if (!preg_match(sprintf('/^(((0[1-9]\%s)|(10\%s)){0,10}((0[1-9])|(10))\%s){2}(((0[1-9]\%s)|(10\%s)){0,10}((0[1-9])|(10)))$/',$this->codeSep,$this->codeSep,$this->lineSep,$this->codeSep,$this->codeSep), $sCodes)) {
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

            if($iUniqueCount==0){
                return false;
            }
        }

        return true;
    }

    public function count($sCodes)
    {
        $iNums = 0;
        $aNums = [];
        $aCode = explode($this->lineSep, $sCodes);
        foreach ($aCode as $sCode) {
            $aNums[] = explode($this->codeSep, $sCode);
        }

        if (count($aNums[0]) > 0 && count($aNums[1]) > 0 && count($aNums[2]) > 0) {
            for ($i = 0; $i < count($aNums[0]); $i++) {
                for ($j = 0; $j < count($aNums[1]); $j++) {
                    for ($k = 0; $k < count($aNums[2]); $k++) {
                        if ($aNums[0][$i] != $aNums[1][$j] && $aNums[0][$i] != $aNums[2][$k] && $aNums[1][$j] != $aNums[2][$k]) {
                            $iNums++;
                        }
                    }
                }
            }
        }

        return $iNums;
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        $aCodes = explode($this->lineSep, $sCodes);

        $aCodes = Algorithm::convertLtCodes($aCodes);
        $numbers = Algorithm::convertLtCodes($numbers);

        $preg = "|[" . str_replace($this->codeSep, '', $aCodes[0]) . "][" . str_replace($this->codeSep, '', $aCodes[1]) . "][" . str_replace($this->codeSep, '', $aCodes[2]) . "]|";

        if (preg_match($preg, implode("", $numbers))) {
            return 1;
        }
    }

}