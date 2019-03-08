<?php namespace Qicilang\Kimchi\Method\Ks;
use \Qicilang\Kimchi\Utils\Algorithm;

//二不同号单选 单式
class EBTH_S extends Base
{
    public function getMName()
    {
        return '二不同号';
    }

    public function getDetail()
    {
        return [
            'total' => 216,
            'levels' => [
                '1' => [
                    'count' => 30,
                    'position' =>[0,1,2],
                ]
            ],
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep,['12','21']);
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        return implode('',(array)array_rand($this->filterArr,2));
    }

    public function regexp($sCodes)
    {
        if (!preg_match(sprintf('/^(([1-6]{2}\%s)*[1-6]{2})$/',$this->codeSep), $sCodes)) {
            return false;
        }

        //重复号码
        $temp =explode($this->codeSep,$sCodes);
        $i = count(array_filter(array_unique($temp)));
        if($i != count($temp)) return false;

        //不能有重复数字
        foreach($temp as $c){
            $t=str_split($c);
            if($t[0] == $t[1]){
                return false;
            }
        }

        //豹子号
        $aBaoZiCode2 = array('11', '22', '33', '44', '55', '66');
        if (count(array_intersect($aBaoZiCode2, $temp)) > 0) {
            return false;
        }

        //排除没有重复数字的
        foreach ($temp as $v) {
            if ($v[0] == $v[1]) {
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
        $temp=array_count_values($numbers);

        if(count($temp)==1){
            //排除豹子
            return 0;
        }

        $i=0;

        if( !($numbers[0] == $numbers[1] && $numbers[0] == $numbers[2]) ) {
            $ts=explode($this->codeSep,$sCodes);
            foreach($ts as $t){
                if(isset($temp[$t[0]]) && isset($temp[$t[1]])){
                    $i++;
                }
            }
        }

        return $i;
    }
}