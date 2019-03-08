<?php namespace Kimchi\Method\Pk10;
use \Kimchi\Utils\Algorithm;

//一直选
class PK10_ZX1 extends Base
{
    public function getMName()
    {
        return '直选复式';
    }

    //描述
    public function getDetail()
    {
        return [
            'total' => 10,
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
        return implode($this->codeSep,array_keys($this->filterArr));
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $rand=rand(1,10);
        return implode($this->codeSep,(array)array_rand($this->filterArr,$rand));
    }


    public function regexp($sCodes)
    {
        //格式
        if (!preg_match(sprintf('/^((0[1-9]\%s)|(10\%s)){0,10}((0[1-9])|(10))$/',$this->codeSep,$this->codeSep), $sCodes)) {
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
        return count(explode($this->codeSep, $sCodes));
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        $exists=array_flip($numbers);
        $aCodes = explode($this->codeSep, $sCodes);

        foreach($aCodes as $c){
            if(isset($exists[$c])) return 1;
        }

    }
}