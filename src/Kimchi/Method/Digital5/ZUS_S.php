<?php namespace Kimchi\Method\Digital5;
use \Kimchi\Utils\Algorithm;

class ZUS_S extends Base
{
    // 112,221,311
    public $all_count =90;

    public function getMName()
    {
        return '组三单式';
    }

    public function getDetail()
    {
        return [
            'total' => 1000,
            'levels' => [
                '1' => [
                    'count' => 3,
                    'position' =>[0,1,2],
                ],
            ],
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep,[112,113,224,556]).'';
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $rand=2;
        $c=(array)array_rand($this->filterArr,$rand);
        $c[]=$c[0];
        return implode('',$c);
    }

    public function regexp($sCodes)
    {
        if( !preg_match(sprintf('/^(([0-9]{3}\%s)*[0-9]{3})$/',$this->codeSep),$sCodes) ) return false;

        //重复号码
        $temp =explode($this->codeSep,$sCodes);
        $i = count(array_filter(array_unique($temp)));
        if($i != count($temp)) return false;

        //豹子号
        if (count(array_intersect($this->bz, $temp)) > 0) {
            return false;
        }

        $exists=[];
        //排除没有重复数字的
        foreach ($temp as $v) {
            $aNumber[0] = substr($v, 0, 1);
            $aNumber[1] = substr($v, 1, 1);
            $aNumber[2] = substr($v, 2, 1);
            if ($aNumber[0] != $aNumber[1] && $aNumber[1] != $aNumber[2] && $aNumber[0] != $aNumber[2]) {
                return false;
            }

            //组选不能重复号码
            $vv=Algorithm::strOrder($v);
            if(isset($exists[$vv])) return false;
            $exists[$vv]=1;
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
        //不限顺序
        $str = Algorithm::strOrder(implode('', $numbers));
        $aCodes = explode($this->codeSep, $sCodes);

        $flip = array_filter(array_count_values($numbers), function ($v) {
            return $v == 2;
        });

        if (count($flip) == 1) {
            foreach ($aCodes as $code) {
                if (Algorithm::strOrder($code) === $str) {
                    return 1;
                }
            }
        }
    }
}