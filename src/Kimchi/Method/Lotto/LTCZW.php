<?php namespace Kimchi\Method\Lotto;
use \Kimchi\Utils\Algorithm;

//猜中位
class LTCZW extends Base
{
    public function getMName()
    {
        return '猜中位';
    }

    //描述
    public function getDetail()
    {
        return [
            'total' => 462,
            'levels' => [
                '1' => [
                    'count' => 28,
                    'position' =>[0,1,2,3,4],
                    'name'=>'中位:3或9',
                ],
                '2' => [
                    'count' => 63,
                    'position' =>[0,1,2,3,4],
                    'name'=>'中位:4或8',
                ],
                '3' => [
                    'count' => 90,
                    'position' =>[0,1,2,3,4],
                    'name'=>'中位:5或7',
                ],
                '4' => [
                    'count' => 100,
                    'position' =>[0,1,2,3,4],
                    'name'=>'中位:6',
                ],
            ],
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep,array_keys($this->czw));
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $rand=rand(1,count($this->czw));
        return implode($this->codeSep,(array)array_rand($this->czw,$rand));
    }


    public function regexp($sCodes)
    {
        //格式
        if (!preg_match(sprintf('/^(([0-9]\%s)*[0-9])$/',$this->codeSep), $sCodes)) {
            return false;
        }

        //去重
        $t=explode($this->codeSep,$sCodes);
        $filterArr = $this->czw;

        $temp = array_filter(array_unique($t),function($v) use ($filterArr) {
            return isset($filterArr[$v]);
        });

        if(count($temp)==0){
            return false;
        }

        return count($temp) == count($t);
    }

    public function count($sCodes)
    {
        //n

        $n = count(explode($this->codeSep,$sCodes));

        return $n;
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        $aCodes = explode($this->codeSep, $sCodes);

        sort($numbers);

        $z = intval($numbers[2]);

        if($levelId == '1'){
            //3,9
            if(in_array($z,array(3,9)) && in_array($z,$aCodes)){
                return 1;
            }
        }elseif($levelId == '2'){
            //4,8
            if(in_array($z,array(4,8)) && in_array($z,$aCodes)){
                return 1;
            }
        }elseif($levelId == '3'){
            //5,7
            if(in_array($z,array(5,7)) && in_array($z,$aCodes)){
                return 1;
            }
        }elseif($levelId == '4'){
            //6
            if($z==6 && in_array($z,$aCodes)){
                return 1;
            }
        }
    }


}