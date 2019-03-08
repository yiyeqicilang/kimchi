<?php namespace Qicilang\Kimchi\Method\Ks;
use \Qicilang\Kimchi\Utils\Algorithm;

//三不同号
class SBTH extends Base
{
    public function getMName()
    {
        return '三不同号';
    }

    public function getDetail()
    {
        return [
            'total' => 216,
            'levels' => [
                '1' => [
                    'count' => 6,
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
        $rand = rand(3,$cnt);
        return implode($this->lineSep,(array)array_rand($this->filterArr,$rand));
    }


    public function regexp($sCodes)
    {
        if (!preg_match(sprintf('/^(([1-6]\%s){0,5}[1-6])$/',$this->codeSep), $sCodes)) {
            return false;
        }

        //去重
        $aCode = explode($this->lineSep,$sCodes);
        if(count($aCode) != count(array_count_values($aCode))){
            return false;
        }

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
        //C(n,3)
        $temp = explode($this->lineSep,$sCodes);
        $n = count($temp);
        return Algorithm::getCombinCount($n,3);
    }


    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        //三不同号投注：当期开奖号码的三个号码各不相同，且投注号码与当期开奖号码全部相符，即中奖。
        $flip = array_filter(array_count_values($numbers), function ($v) {
            return $v >= 2;
        });

        //非重复的
        if (count($flip) == 0) {
            $preg = "|[" . str_replace($this->lineSep, '', $sCodes) . "]{3}|";
            if (preg_match($preg, implode("", $numbers))) {
                return 1;
            }
        }
    }

}