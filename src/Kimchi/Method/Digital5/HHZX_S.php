<?php namespace Qicilang\Kimchi\Method\Digital5;
use \Qicilang\Kimchi\Utils\Algorithm;

//混合组选
class HHZX_S extends Base
{
    //123,531,534,534,123
    public $all_count =270;

    public function getMName()
    {
        return '混合组选';
    }

    public function getDetail()
    {
        return [
            'total' => 1000,
            'levels' => [
                '1' => [
                    'count' => 3,
                    'position' =>[0,1,2],
                    'name' =>'组三',
                ],
                '2' => [
                    'count' => 6,
                    'position' =>[0,1,2],
                    'name' =>'组六',
                ],
            ],
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep,[123,531,534,534,123]).'(组三号,组六号)';
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        return implode('',(array)array_rand($this->filterArr,3));
    }

    public function regexp($sCodes)
    {
        //校验
        if( !preg_match(sprintf('/^(([0-9]{3}\%s)*[0-9]{3})$/',$this->codeSep),$sCodes) ) return false;

        $temp = explode($this->codeSep, $sCodes);
        $iNums = count(array_filter(array_unique($temp)));

        if($iNums != count($temp)) return false;

        //排除豹子号
        foreach($temp as $c){
            if($c[0] == $c[1] && $c[1]==$c[2]){
                return false;
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
        $str = Algorithm::strOrder(implode('',$numbers));

        $aCode = explode($this->codeSep, $sCodes);

        if ($levelId == '1') {
            $flip = array_filter(array_count_values($numbers), function ($v) {
                return $v == 2;
            });

            //组三
            if (count($flip) == 1) {
                foreach ($aCode as $code) {
                    if ($str === Algorithm::strOrder($code)) {
                        return 1;
                    }
                }
            }
        } elseif ($levelId == '2') {
            $flip = array_filter(array_count_values($numbers), function ($v) {
                return $v >= 2;
            });

            //组六
            if (count($flip) == 0) {
                foreach ($aCode as $code) {
                    if ($str === Algorithm::strOrder($code)) {
                        return 1;
                    }
                }
            }
        }
    }
}