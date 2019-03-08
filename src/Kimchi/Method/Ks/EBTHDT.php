<?php namespace Qicilang\Kimchi\Method\Ks;
use \Qicilang\Kimchi\Utils\Algorithm;

//三不同号胆拖
class EBTHDT extends Base
{
    public function getMName()
    {
        return '二不同号胆拖';
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
        return implode($this->codeSep,array_keys($this->filterArr))
            .$this->lineSep.implode($this->codeSep,array_keys($this->filterArr));
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $cnt=count($this->filterArr);
        $rand=1;
        $rand2=$cnt-$rand;

        $temp=(array)array_rand($this->filterArr,$rand);
        $_arr2=array_diff(array_keys($this->filterArr),$temp);
        $arr[]=implode($this->lineSep,$temp);
        $arr[]=implode($this->lineSep,(array)array_rand(array_flip($_arr2),$rand2));

        return implode($this->lineSep,$arr);
    }

    public function regexp($sCodes)
    {
        if (!preg_match(sprintf('/^(([1-6]\%s){0,5}[1-6])\%s(([1-6]\%s){0,5}[1-6])$/',$this->codeSep,$this->lineSep,$this->codeSep), $sCodes)) {
            return false;
        }

        $filterArr = $this->filterArr;

        $aTmp = explode($this->lineSep, $sCodes);
        $aDan = explode($this->lineSep, $aTmp[0]);
        if (count($aDan) != count(array_filter(array_unique($aDan),function($v) use($filterArr) {
                return isset($filterArr[$v]);
            }))) { //不能有重复的号码
            return false;
        }
        $aTuo = explode($this->lineSep, $aTmp[1]);
        if (count($aTuo) != count(array_filter(array_unique($aTuo),function($v) use($filterArr) {
                return isset($filterArr[$v]);
            }))) { //不能有重复的号码
            return false;
        }

        //有重复的
        if (count(array_intersect($aDan, $aTuo)) > 0) {
            return false;
        }

        if(count($aDan)==0 || count($aTuo)==0){
            return false;
        }

        return true;
    }

    public function count($sCodes)
    {
        //$this->_getCombinCount($iTuoCount,2-$iDanCount);
        $aTmp = explode($this->lineSep, $sCodes);
        $aDan = explode($this->lineSep, $aTmp[0]);
        $aTuo = explode($this->lineSep, $aTmp[1]);
        return Algorithm::getCombinCount(count($aTuo), 2 - count($aDan));
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        if( $numbers[0] != $numbers[1] ){
            $aTmp = explode($this->lineSep, $sCodes);
            $aDan = explode($this->lineSep,$aTmp[0]);
            $aTuo = explode($this->lineSep,$aTmp[1]);

            $iNum = count($aDan);
            //胆码都存在
            $i=0;
            if(count(array_intersect($aDan,$numbers)) == $iNum){
                $arr = array_diff($numbers, $aDan);
                $i=count(array_intersect($arr,$aTuo));
            }

            return intval($i>0);
        }
    }
}