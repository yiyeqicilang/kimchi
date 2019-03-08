<?php namespace Kimchi\Method\Ks;
use \Kimchi\Utils\Algorithm;

//快三和值
class KSHZ extends Base
{
    public function getMName()
    {
        return '快三和值';
    }

    public function getDetail()
    {
        return [
            'total' => 216,
            'levels' => [
                '1' => [
                    'count' => 1,
                    'position' =>[0,1,2],
                    'name'=>'和值:3,18',
                ],
                '2' => [
                    'count' => 3,
                    'position' =>[0,1,2],
                    'name'=>'和值:4,17',
                ],
                '3' => [
                    'count' => 6,
                    'position' =>[0,1,2],
                    'name'=>'和值:5,16',
                ],
                '4' => [
                    'count' => 10,
                    'position' =>[0,1,2],
                    'name'=>'和值:6,15',
                ],
                '5' => [
                    'count' => 15,
                    'position' =>[0,1,2],
                    'name'=>'和值:7,14',
                ],
                '6' => [
                    'count' => 21,
                    'position' =>[0,1,2],
                    'name'=>'和值:8,13',
                ],
                '7' => [
                    'count' => 25,
                    'position' =>[0,1,2],
                    'name'=>'和值:9,12',
                ],
                '8' => [
                    'count' => 27,
                    'position' =>[0,1,2],
                    'name'=>'和值:10,11',
                ],
            ],
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep,array_keys($this->kshz));
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $rand = rand(1,count($this->kshz));
        return implode($this->lineSep,(array)array_rand($this->kshz,$rand));
    }

    public function regexp($sCodes)
    {
        //去重
        $t=explode($this->lineSep,$sCodes);
        $temp =array_unique($t);
        $arr = $this->kshz;

        $temp = array_filter($temp,function($v) use ($arr) {
            return isset($arr[$v]);
        });

        if(count($temp)==0){
            return false;
        }

        return count($temp) == count($t);
    }

    public function count($sCodes)
    {
        //枚举之和
        $n = 0;
        $temp = explode($this->lineSep,$sCodes);
        foreach($temp as $c){
            $n += $this->kshz[$c];
        }

        return $n;
    }

    /*
    和值:3,18:320.00元 (1注)
    和值:4,17:110.00元 (3注)
    和值:5,16:55.00元 (6注)
    和值:6,15:30.00元 (10注)
    和值:7,14:20.00元 (15注)
    和值:8,13:14.50元 (21注)
    和值:9,12:13.00元 (25注)
    和值:10,11:11.50元 (27注)
 */
    public static $ls = array(
        "1"=>array(3,18),
        "2"=>array(4,17),
        "3"=>array(5,16),
        "4"=>array(6,15),
        "5"=>array(7,14),
        "6"=>array(8,13),
        "7"=>array(9,12),
        "8"=>array(10,11),
    );

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        //和值：投注号码与当期开奖号码的三个号码的和值相符，即中奖。
        $val = array_sum($numbers);

        $aCodes = explode($this->lineSep, $sCodes);

        $l = self::$ls[$levelId];
        if(in_array($val,$l)){
            foreach ($aCodes as $code) {
                if ($code == $val) {
                    return 1;
                }
            }
        }
    }

}