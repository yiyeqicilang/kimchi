<?php namespace Qicilang\Kimchi\Method\Ks;
use \Qicilang\Kimchi\Utils\Algorithm;

//二同号单选 单式
class ETHDX_S extends Base
{
    public function getMName()
    {
        return '二同号单选';
    }

    public function getDetail()
    {
        return [
            'total' => 216,
            'levels' => [
                '1' => [
                    'count' => 3,
                    'position' =>[0,1,2],
                ]
            ],
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep,[112,221]);
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $temp=array_rand($this->filterArr,1);
        $arr[]=$temp;
        $arr[]=$temp;
        $_arr2=array_diff(array_keys($this->filterArr),array($temp));
        $arr[]=array_rand(array_flip($_arr2),1);
        return implode('',$arr);
    }

    public function regexp($sCodes)
    {
        if (!preg_match(sprintf('/^(([1-6]{3}\%s)*[1-6]{3})$/',$this->codeSep), $sCodes)) {
            return false;
        }

        //重复号码
        $temp =explode($this->codeSep,$sCodes);
        $i = count(array_filter(array_unique($temp)));
        if($i != count($temp)) return false;

        //豹子号
        $aBaoZiCode3 = array('111', '222', '333', '444', '555', '666');
        if (count(array_intersect($aBaoZiCode3, $temp)) > 0) {
            return false;
        }

        //排除没有重复数字的
        foreach ($temp as $v) {
            if ($v[0] != $v[1] && $v[1] != $v[2] && $v[0] != $v[2]) {
                return false;
            }
        }

        return true;
    }

    public function count($sCodes)
    {
        return count(explode($this->codeSep,$sCodes));
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        //开奖号码：636
        //投注号码: 663
        //@todo:未中奖?

        //不限顺序
        $str = Algorithm::strOrder(implode('', $numbers));
        $aCodes = explode($this->codeSep, $sCodes);

        $flip = array_filter(array_count_values($numbers), function ($v) {
            return $v == 2;
        });

        $i=0;
        if (count($flip) == 1) {
            foreach ($aCodes as $code) {
                if (Algorithm::strOrder($code) === $str) {
                    $i++;
                }
            }
        }

        return $i;
    }

}