<?php namespace Qicilang\Kimchi\Method\Ks;
use \Qicilang\Kimchi\Utils\Algorithm;

//三同号通选
class STHTX extends Base
{
    public function getMName()
    {
        return '三同号通选';
    }

    public function getDetail()
    {
        return [
            'total' => 216,
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
        $last = end($this->tx);
        return $last;
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $last = end($this->tx);
        return $last;
    }

    //格式解析
    public function resolve($codes)
    {
        return strtr($codes,array_flip($this->tx));
    }

    //还原格式
    public function unresolve($codes)
    {
        return strtr($codes,$this->tx);
    }

    public function regexp($sCodes)
    {
        $last = end(array_keys($this->tx));
        return $sCodes ==$last;
    }

    public function count($sCodes)
    {
        return 1;
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        //三同号通选：当期开奖号码的三个号码相同，即中奖；
        if($numbers[0]==$numbers[1] && $numbers[1]==$numbers[2]){
            return 1;
        }
    }

}