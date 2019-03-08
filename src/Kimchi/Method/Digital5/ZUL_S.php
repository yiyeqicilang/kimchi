<?php namespace Qicilang\Kimchi\Method\Digital5;
use \Qicilang\Kimchi\Utils\Algorithm;

class ZUL_S extends Base
{
    // 123,125,123,123,123,123,
    public $all_count =120;

    public function getMName()
    {
        return '组六单式';
    }

    public function getDetail()
    {
        return [
            'total' => 1000,
            'levels' => [
                '1' => [
                    'count' => 6,
                    'position' =>[0,1,2],
                ],
            ],
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep,[123,124,126,148,179]).'';
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $rand=3;
        return implode('',(array)array_rand($this->filterArr,$rand));
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

        //重复数字
        $exists=[];
        foreach ($temp as $v) {
            //不能有重复数字
            $aNumber[0] = substr($v, 0, 1);
            $aNumber[1] = substr($v, 1, 1);
            $aNumber[2] = substr($v, 2, 1);
            if ($aNumber[0] == $aNumber[1] || $aNumber[1] == $aNumber[2] || $aNumber[0] == $aNumber[2]) {
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

    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        //不限顺序
        $str = Algorithm::strOrder(implode('', $numbers));
        $aCodes = explode($this->codeSep, $sCodes);

        $flip = array_filter(array_count_values($numbers), function ($v) {
            return $v >= 2;
        });

        if (count($flip) == 0) {
            foreach ($aCodes as $code) {
                if (Algorithm::strOrder($code) === $str) {
                    return 1;
                }
            }
        }
    }
}