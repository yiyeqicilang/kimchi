<?php namespace Kimchi\Method\Lotto;
use \Kimchi\Utils\Algorithm;

class LTRX3_S extends Base
{
    public function getMName()
    {
        return '任选三中三';
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
        return implode($this->codeSep,['01 02 03','03 04 05','05 06 07']);
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $rand=3;
        return implode(' ',(array)array_rand($this->filterArr,$rand));
    }


    public function regexp($sCodes)
    {
        //格式
//        if (!preg_match("/^(((0[1-9]\s)|(1[01]\s)){2}((0[1-9])|(1[01]))\,)*(((0[1-9]\s)|(1[01]\s)){2}((0[1-9])|(1[01])))$/", $sCodes)) {
//            return false;
//        }

        $aCode = explode($this->codeSep,$sCodes);

        //去重
        if(count($aCode) != count(array_filter(array_unique($aCode)))) return false;

        //校验
        foreach ($aCode as $sTmpCode) {
            $aTmpCode = explode(" ", $sTmpCode);
            if (count($aTmpCode) != 3) {
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
        return count(explode($this->codeSep,$sCodes));
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        $aCodes = explode($this->codeSep,$sCodes);
        $i=0;
        foreach ($aCodes as $code) {
            if(count(array_intersect(explode(' ',$code),$numbers)) >=3 ) $i++;
        }

        return $i;
    }

}