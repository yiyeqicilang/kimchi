<?php namespace Kimchi\Method\Digital5;
use \Kimchi\Utils\Algorithm;

class ZU2_S extends Base
{
    // 12,21,31
    public $all_count =45;

    public function getMName()
    {
        return '组选单式';
    }

    public function getDetail()
    {
        return [
            'total' => 100,
            'levels' => [
                '1' => [
                    'count' => 2,
                    'position' =>[0,1],
                ],
            ],
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep,[12,23,35]).'';
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $rand=2;
        return implode('',(array)array_rand($this->filterArr,$rand));
    }

    public function regexp($sCodes)
    {
        if( !preg_match(sprintf('/^(([0-9]{2}\%s)*[0-9]{2})$/',$this->codeSep),$sCodes) ) return false;

        //重复号码
        $temp =explode($this->codeSep,$sCodes);
        $i = count(array_filter(array_unique($temp)));
        if($i != count($temp)) return false;

        //对子号
        $exists=[];
        $dzArr = $this->dz2;
        foreach($temp as $c){
            if(isset($dzArr[$c])){
                //不包含对子号
                return false;
            }

            //组选不能重复号码
            $vv=Algorithm::strOrder($c);
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
        $str1 = Algorithm::strOrder(implode('', $numbers));
        $str2 = Algorithm::strOrder(implode('', $numbers),true);

        $aCodes = explode($this->codeSep, $sCodes);

        if ($numbers[0] != $numbers[1]) {
            foreach ($aCodes as $code) {
                if ($code === $str1 || $code === $str2) {
                    return 1;
                }
            }
        }
    }
}