<?php namespace Kimchi\Method\Digital5;
use \Kimchi\Utils\Algorithm;

class SXZU12 extends Base
{
    public $all_count =360;

    public function getMName()
    {
        return '组选12';
    }

    public function getDetail()
    {
        return [
            'total' => 10000,
            'levels' => [
                '1' => [
                    'count' => 12,
                    'position' =>[0,1,2,3],
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
        for($i=0;$i<2;$i++){
            $rand=rand(2,10);
            $arr[]= implode($this->codeSep,(array)array_rand($this->filterArr,$rand));
        }

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
        //0,1,2,3,4,5,6,7,8,9|0,1,2,3,4,5,6,7,8,9
        //m表示上一排数量
        //n表示下一排数量
        //h表示重复的数量
        //C(m,1)*C(n,2)-C(h,1)*C(n-1,1)

        $temp = explode($this->lineSep,$sCodes);
        $t1=explode($this->codeSep,$temp[0]);
        $t2=explode($this->codeSep,$temp[1]);
        $m = count($t1);
        $n = count($t2);
        $t3 = array_intersect_key(array_flip($t1), array_flip($t2));

        $h = count($t3);

        return Algorithm::getCombinCount($m,1) * Algorithm::getCombinCount($n,2) - Algorithm::getCombinCount($h,1)*Algorithm::getCombinCount($n-1,1);
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        $str = Algorithm::strOrder(implode('', $numbers));

        $aCodes = explode($this->lineSep, $sCodes);

        $aP1 = Algorithm::getCombination(explode($this->codeSep, $aCodes[0]), 1);
        $aP2 = Algorithm::getCombination(explode($this->codeSep, $aCodes[1]), 2);
        foreach ($aP2 as $v2) {
            $v2 = str_replace(' $this->codeSep',$v2);
            $vs= str_split($v2);
            foreach ($aP1 as $v1) {
                if (in_array($v1, $vs)) continue;
                if ($str === Algorithm::strOrder(str_repeat($v1, 2) . str_repeat($v2, 1))) {
                    return 1;
                }
            }
        }
        return 0;
    }

}