<?php namespace Kimchi\Method\Lotto;
use \Kimchi\Utils\Algorithm;

//组选3
class LTZU3 extends Base
{
    public function getMName()
    {
        return '组选复式';
    }

    //描述
    public function getDetail()
    {
        return [
            'total' => 165,
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
        return implode($this->codeSep,array_keys($this->filterArr));
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $rand=rand(3,count($this->filterArr));
        return implode($this->codeSep,(array)array_rand($this->filterArr,$rand));
    }

    public function regexp($sCodes)
    {
        //格式
        if (!preg_match(sprintf('/^((0[1-9]\%s)|(1[01]\%s)){0,10}((0[1-9])|(1[01]))$/',$this->codeSep,$this->codeSep), $sCodes)) {
            return false;
        }

        $filterArr = $this->filterArr;

        //重复
        $aCode = explode($this->codeSep, $sCodes);
        $nums = count(array_filter(array_unique($aCode),function($v) use($filterArr) {
            return isset($filterArr[$v]);
        }));

        if($nums==0){
            return false;
        }

        if($nums != count($aCode)) return false;

        return true;
    }

    public function count($sCodes)
    {
        //C(n,3)
        $n = count(explode($this->codeSep,$sCodes));

        return Algorithm::getCombinCount($n,3);
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        $aCodes = Algorithm::convertLtCodes($sCodes);
        $numbers = Algorithm::convertLtCodes($numbers);

        if ($numbers[0] != $numbers[1] && $numbers[1] != $numbers[2]  && $numbers[0] != $numbers[2]) {
            $preg = "|[" . str_replace($this->codeSep, '', $aCodes) . "]{3}|";
            if (preg_match($preg, implode("", $numbers))) {
                return 1;
            }
        }
    }

}