<?php namespace Kimchi\Method\Ks;
use \Kimchi\Utils\Algorithm;

//二不同号
class EBTH extends Base
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
        return implode($this->codeSep,array_keys($this->filterArr));
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $cnt=count($this->filterArr);
        $rand=rand(2,$cnt);
        return implode($this->lineSep,(array)array_rand($this->filterArr,$rand));
    }

    public function regexp($sCodes)
    {
        if (!preg_match(sprintf('/^(([1-6]\%s){0,5}[1-6])$/',$this->codeSep), $sCodes)) {
            return false;
        }

        $temp=explode($this->lineSep,$sCodes);
        if(count($temp) != count(array_count_values($temp))){
            return 0;
        }

        $aCode = explode($this->lineSep,$sCodes);

        $filterArr = $this->filterArr;
        $nums = count(array_filter($aCode, function($v) use ($filterArr) {
            return isset($filterArr[$v]);
        }));

        if($nums==0){
            return false;
        }

        if($nums != count($aCode)) return false;

        return true;
    }

    public function count($sCodes)
    {
        //C(n,2)
        $temp = explode($this->lineSep,$sCodes);
        $n = count($temp);
        return Algorithm::getCombinCount($n,2);
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        //二不同号投注：当期开奖号码中有两个号码不相同，且投注号码中的两个不同号码与当期开奖号码中的两个不同号码相符，即中奖。
        //两个非重复的
        $temp=array_count_values($numbers);

        if(count($temp)==1){
            //排除豹子
            return 0;
        }

        $i=0;

        $arrs = Algorithm::getCombination(explode($this->lineSep,$sCodes), 2);
        foreach ($arrs as $str) {
            $t=explode(' ',$str);
            if(isset($temp[$t[0]]) && isset($temp[$t[1]])){
                $i++;
            }
        }

        return $i;
    }

}