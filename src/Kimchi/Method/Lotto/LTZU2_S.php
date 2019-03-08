<?php namespace Kimchi\Method\Lotto;
use \Kimchi\Utils\Algorithm;

class LTZU2_S extends Base
{
    public function getMName()
    {
        return '组选单式';
    }

    //描述
    public function getDetail()
    {
        return [
            'total' => 55,
            'levels' => [
                '1' => [
                    'count' => 1,
                    'position' => [0, 1],
                ]
            ],
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep, ['01 02', '03 04', '05 06']);
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $rand = 2;
        return implode(' ', (array)array_rand($this->filterArr, $rand));
    }

    public function regexp($sCodes)
    {
        //格式
        if (!preg_match(sprintf('/^(((0[1-9]\s)|(1[01]\s))((0[1-9])|(1[01]))\%s)*(((0[1-9]\s)|(1[01]\s))((0[1-9])|(1[01])))$/',$this->codeSep), $sCodes)) {
            return false;
        }

        $aCode = explode($this->codeSep, $sCodes);

        //去重
        if (count($aCode) != count(array_filter(array_unique($aCode)))) return true;

        //校验
        foreach ($aCode as $sTmpCode) {
            $aTmpCode = explode(" ", $sTmpCode);
            if (count($aTmpCode) != 2) {
                return false;
            }
            if (count($aTmpCode) != count(array_filter(array_unique($aTmpCode)))) {
                return false;
            }
            foreach ($aTmpCode as $c) {
                if (!isset($this->filterArr[$c])) {
                    return false;
                }
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
        $aCodes = explode($this->codeSep, str_replace(' ', '', Algorithm::convertLtCodes($sCodes)));
        $str = Algorithm::strOrder(implode('', Algorithm::convertLtCodes($numbers)));

        foreach ($aCodes as $code) {
            if (Algorithm::strOrder($code) === $str) {
                return 1;
            }
        }
    }

}