<?php namespace Kimchi\Method\Digital5;
use \Kimchi\Utils\Algorithm;

//3星特殊
class TS3 extends Base
{
    public $all_count =3;

    public function getMName()
    {
        return '特殊号';
    }

    public function getDetail()
    {
        return [
            'total' => 1000,
            'levels' => [
                '1' => [
                    'count' => 10,
                    'position' =>[0,1,2],
                    'name' => '豹子',
                ],
                '2' => [
                    'count' => 60,
                    'position' =>[0,1,2],
                    'name' => '顺子',
                ],
                '3' => [
                    'count' => 270,
                    'position' =>[0,1,2],
                    'name' => '对子',
                ],
            ],
        ];
    }

    public function getExample()
    {
        return implode($this->codeSep,array_keys($this->bds))
            .'('
            .implode($this->codeSep,array_values($this->bds))
            .')';
    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $rand=rand(1,3);
        return implode($this->codeSep,(array)array_rand(array_flip($this->bds),$rand));
    }

    //格式解析
    public function resolve($codes)
    {
        return strtr($codes,array_flip($this->bds));
    }

    //还原格式
    public function unresolve($codes)
    {
        return strtr($codes,$this->bds);
    }

    public function regexp($sCodes)
    {
        $t = explode($this->codeSep,$sCodes);

        $bds = $this->bds;

        $temp = array_filter(array_unique($t),function($v) use($bds) {
            return isset($bds[$v]);
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
        sort($numbers);

        $aCodes = explode($this->codeSep, $sCodes);

        if ($levelId == "1" && $numbers[0] == $numbers[1] && $numbers[1] == $numbers[2]) {
            //bz
            if (in_array('b', $aCodes)) {
                return 1;
            }
        } elseif ($levelId == "2") {
            $_code=implode('',$numbers);
            $_sz=array_flip($this->sz);

            //sz
            if (in_array('s', $aCodes) && isset($_sz[$_code])) {
                return 1;
            }
        } elseif ($levelId == "3" && ($numbers[0] == $numbers[1] || $numbers[1] == $numbers[2] || $numbers[0] == $numbers[2])
            && !($numbers[0] == $numbers[1] && $numbers[1] == $numbers[2])
        ) {
            //dz 非豹子号
            if (in_array('d', $aCodes)) {
                return 1;
            }
        }
    }

}