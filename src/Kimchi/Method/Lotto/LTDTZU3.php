<?php namespace Qicilang\Kimchi\Method\Lotto;
use \Qicilang\Kimchi\Utils\Algorithm;

//组选胆拖
class LTDTZU3 extends Base
{
    public function getMName()
    {
        return '组选胆拖';
    }

    //描述
    public function getDetail()
    {
        return [
            'total' => 165,
            'levels' => [
                '1' => [
                    'count' => 1,
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
        $rand=rand(1,2);
        $rand2=$cnt-$rand;

        $temp=(array)array_rand($this->filterArr,$rand);
        $_arr2=array_diff(array_keys($this->filterArr),$temp);
        $arr[]=implode($this->codeSep,$temp);
        $arr[]=implode($this->codeSep,(array)array_rand(array_flip($_arr2),$rand2));

        return implode($this->lineSep,$arr);
    }

    public function regexp($sCodes)
    {
        if (!preg_match(sprintf('/^(((0[1-9]\%s)|(1[01]\%s)){0,6}((0[1-9])|(1[01]))\%s){1}(((0[1-9]\%s)|(1[01]\%s)){0,10}((0[1-9])|(1[01])))$/',$this->codeSep,$this->codeSep,$this->lineSep,$this->codeSep,$this->codeSep), $sCodes)) {
            return false;
        }

        $filterArr = $this->filterArr;

        $aTmp = explode($this->lineSep, $sCodes);
        $aDan = explode($this->codeSep, $aTmp[0]);
        if (count($aDan) != count(array_filter(array_unique($aDan),function($v) use($filterArr) {
                return isset($filterArr[$v]);
            }))) { //不能有重复的号码
            return false;
        }
        $aTuo = explode($this->codeSep, $aTmp[1]);
        if (count($aTuo) != count(array_filter(array_unique($aTuo),function($v) use($filterArr) {
                return isset($filterArr[$v]);
            }))) { //不能有重复的号码
            return false;
        }

        if(count($aDan)==0 || count($aTuo)==0){
            return false;
        }

        if (count($aDan) >= 3) {
            return false;
        }

        //有重复的
        if (count(array_intersect($aDan, $aTuo)) > 0) {
            return false;
        }

        return true;
    }

    public function count($sCodes)
    {
        $aTmp = explode($this->lineSep, $sCodes);
        $aDan = explode($this->codeSep, $aTmp[0]);
        $aTuo = explode($this->codeSep, $aTmp[1]);
        return Algorithm::getCombinCount(count($aTuo), 3 - count($aDan));
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        //1胆码 & 2拖码 顺序不限
        $sCodes = Algorithm::convertLtCodes($sCodes);
        $numbers = Algorithm::convertLtCodes($numbers);

        $aTmp = explode($this->lineSep, $sCodes);
        $aDan = explode($this->codeSep,$aTmp[0]);
        $aTuo = explode($this->codeSep,$aTmp[1]);

        $iNum = count($aDan);
        //胆码都存在
        if(count(array_intersect($aDan,$numbers)) == $iNum){
            $iCnt = 3-$iNum;
            $i=0;
            $arr = array_diff($numbers, $aDan);
            foreach($aTuo as $t){
                if(in_array($t,$arr)){
                    $i++;
                }
            }

            if($i >= $iCnt){
                return 1;
            }
        }
    }

}