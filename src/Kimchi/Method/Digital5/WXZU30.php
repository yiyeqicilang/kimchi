<?php namespace Qicilang\Kimchi\Method\Digital5;
use \Qicilang\Kimchi\Utils\Algorithm;

class WXZU30 extends Base
{
    public $all_count =360;

    public function getMName()
    {
        return '组选30';
    }

    public function getDetail()
    {
        return [
            'total' => 100000,
            'levels' => [
                '1' => [
                    'count' => 30,
                    'position' =>[0,1,2,3,4],
                ],
            ],
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep,$this->digital5_example).$this->lineSep.implode($this->codeSep,$this->digital5_example);
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $arr=array();

        $rand=rand(2,count($this->filterArr));
        $arr[]= implode($this->codeSep,(array)array_rand($this->filterArr,$rand));
        $rand=rand(2,count($this->filterArr));
        $arr[]= implode($this->codeSep,(array)array_rand($this->filterArr,$rand));

        return implode($this->lineSep,$arr);
    }

    public function regexp($sCodes)
    {
        if( !preg_match(sprintf('/^(([0-9]\%s){0,9}[0-9])\%s(([0-9]\%s){0,9}[0-9])$/',$this->codeSep,$this->lineSep,$this->codeSep),$sCodes) ) return false;

        $filterArr = $this->filterArr;

        //去重
        $sCodes = explode($this->lineSep, $sCodes);
        foreach($sCodes as $codes){
            $temp = explode($this->codeSep,$codes);
            if(count($temp) != count(array_filter(array_unique($temp),function($v) use($filterArr) {
                    return isset($filterArr[$v]);
                }))) return false;

            if(count($temp)==0){
                return false;
            }
        }

        return true;
    }

    public function count($sCodes)
    {
        //m表示上一排数量
        //n表示下一排数量
        //h表示重复的数量
        //C(m,2)*C(n,1)-C(h,2)*C(2,1)-C(h,1)*C(m-h,1)

        $temp = explode($this->lineSep,$sCodes);
        $t1=explode($this->codeSep,$temp[0]);
        $t2=explode($this->codeSep,$temp[1]);
        $m = count($t1);
        $n = count($t2);
        $t = array_intersect_key(array_flip($t1), array_flip($t2));
        $h = count($t);

        return Algorithm::getCombinCount($m,2) * Algorithm::getCombinCount($n,1) - Algorithm::getCombinCount($h,2)*Algorithm::getCombinCount(2,1)-Algorithm::getCombinCount($h,1)*Algorithm::getCombinCount($m-$h,1);
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        $str = Algorithm::strOrder(implode('', $numbers));

        $aCodes = explode($this->lineSep, $sCodes);

        $aP1 = Algorithm::getCombination(explode($this->codeSep, $aCodes[0]), 2);
        $aP2 = Algorithm::getCombination(explode($this->codeSep, $aCodes[1]), 1);
        foreach ($aP1 as $v1) {
            $v1=str_replace(' ', '', $v1);
            $vs = str_split($v1);
            foreach ($aP2 as $v2) {
                if (in_array($v2, $vs)) continue;
                if ($str === Algorithm::strOrder(str_repeat($v1, 2) . str_repeat($v2, 1))) {
                    return 1;
                }
            }
        }

    }
}