<?php namespace Kimchi\Method\Lotto;
use \Kimchi\Utils\Algorithm;

//定单双
class LTDDS extends Base
{
    public function getMName()
    {
        return '定单双';
    }

    //描述
    public function getDetail()
    {
        return [
            'total' => 462,
            'levels' => [
                '1' => [
                    'count' => 1,
                    'position' =>[0,1,2,4,5],
                    'name' => '0单5双',
                ],
                '2' => [
                    'count' => 6,
                    'position' =>[0,1,2,4,5],
                    'name' => '5单0双',
                ],
                '3' => [
                    'count' => 30,
                    'position' =>[0,1,2,4,5],
                    'name' => '1单4双',
                ],
                '4' => [
                    'count' => 75,
                    'position' =>[0,1,2,4,5],
                    'name' => '4单1双',
                ],
                '5' => [
                    'count' => 150,
                    'position' =>[0,1,2,4,5],
                    'name' => '2单3双',
                ],
                '6' => [
                    'count' => 200,
                    'position' =>[0,1,2,4,5],
                    'name' => '3单2双',
                ],
            ],
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep,array_keys($this->dds));
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $rand=rand(1,count($this->dds));
        return implode($this->codeSep,(array)array_rand($this->dds,$rand));
    }


    //格式解析
    public function resolve($codes)
    {
        return strtr($codes,array_flip($this->dds));
    }

    //还原格式
    public function unresolve($codes)
    {
        return strtr($codes,$this->dds);
    }

    public function regexp($sCodes)
    {
        //格式
        if (!preg_match(sprintf('/^(([0-9]\%s)*[0-9])$/',$this->codeSep), $sCodes)) {
            return false;
        }

        //去重
        $t=explode($this->codeSep,$sCodes);
        $filterArr = $this->dds;

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
        return count(explode($this->codeSep,$sCodes));
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        $aCodes = explode($this->codeSep, $sCodes);

        $d = 0;
        foreach ($numbers as $n) {
            if(intval($n) %2 !== 0){
                $d++;
            }
        }

        $d = $d.'';

        if($levelId == '1'){
            //0
            if($d=='0' && in_array('0',$aCodes)){
                return 1;
            }
        }elseif($levelId == '2'){
            //5
            if($d=='5' && in_array('5',$aCodes)){
                return 1;
            }
        }elseif($levelId == '3'){
            //1
            if($d=='1' && in_array('1',$aCodes)){
                return 1;
            }
        }elseif($levelId == '4'){
            //4
            if($d=='4' && in_array('4',$aCodes)){
                return 1;
            }
        }elseif($levelId == '5'){
            //2
            if($d=='2' && in_array('2',$aCodes)){
                return 1;
            }
        }elseif($levelId == '6'){
            //3
            if($d=='3' && in_array('3',$aCodes)){
                return 1;
            }
        }
    }

}