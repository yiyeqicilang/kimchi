<?php namespace Kimchi\Method\Digital5;
use \Kimchi\Utils\Algorithm;

class LH extends Base
{
    public $all_count =10;

    public function getMName()
    {
        return '龙虎';
    }

    public function getDetail()
    {
        return [
            'total' => 100,
            'levels' => [
                '1' => [
                    'count' => 10,
                    'position' =>[0,1],
                    'name' => '和',
                ],
                '2' => [
                    'count' => 45,
                    'position' =>[0,1],
                    'name' => '龙',
                ],
                '3' => [
                    'count' => 45,
                    'position' =>[0,1],
                    'name' => '虎',
                ],
            ],
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep,array_keys($this->lhd))
            .'('
            .implode($this->codeSep,array_values($this->lhd))
            .')';
    }


    //供测试用 生成随机投注
    public function randomCodes()
    {
        $rand=rand(1,3);
        return implode($this->codeSep,(array)array_rand(array_flip($this->lhd),$rand));
    }

    //格式解析
    public function resolve($codes)
    {
        return strtr($codes,array_flip($this->lhd));
    }

    public function regexp($sCodes)
    {
        $filterArr = $this->lhd;

        //去重
        $sCodes = explode($this->codeSep, $sCodes);
        if(count($sCodes) != count(array_filter(array_unique($sCodes),function($v) use($filterArr) {
                return isset($filterArr[$v]);
            }))) return false;

        if(count($sCodes)==0){
            return false;
        }

        return true;
    }

    public function count($sCodes)
    {
        $cnt = 0;
        $temp = explode($this->codeSep,$sCodes);

        foreach($temp as $c){
            $cnt++;
        }

        return $cnt;
    }

    public function assertLevel($levelId, $sCodes, Array $numbers)
    {

        $aCodes = explode($this->codeSep, $sCodes);

        if($levelId=='2' && in_array('l',$aCodes)){
            $n=intval($numbers[0]);
            $m=intval($numbers[1]);
            if($n>$m){
                return 1;
            }
        }elseif($levelId=='3' && in_array('h',$aCodes)){
            $n=intval($numbers[0]);
            $m=intval($numbers[1]);
            if($n<$m){
                return 1;
            }
        }elseif($levelId=='1' && in_array('d',$aCodes)){
            if($numbers[0]===$numbers[1]){
                return 1;
            }
        }

        return 0;
    }

}