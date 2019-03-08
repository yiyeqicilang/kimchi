<?php namespace Qicilang\Kimchi\Method\Digital5;
use \Qicilang\Kimchi\Utils\Algorithm;

//2位大小单双
class DXDS extends Base
{
    public $all_count =16;

    public function getMName()
    {
        return '大小单双';
    }

    public function getDetail()
    {
        return [
            'total' => 100,
            'levels' => [
                '1' => [
                    'count' => 25,
                    'position' =>[0,1],
                ]
            ],
        ];
    }

    public function getExample()
    {
        $keys = array_keys($this->dxds);
        $values = array_keys($this->dxds);
        return implode($this->codeSep,$keys).$this->lineSep.implode($this->codeSep,$keys)
            .'('
            .implode($this->codeSep,$values).$this->lineSep.implode($this->codeSep,$values)
            .')';

    }

    //供测试用 生成随机投注
    public function randomCodes()
    {
        $line=array();
        $rand=rand(1,count($this->dxds));
        $line[]=implode($this->codeSep,(array)array_rand(array_flip($this->dxds),$rand));
        $rand=rand(1,count($this->dxds));
        $line[]=implode($this->codeSep,(array)array_rand(array_flip($this->dxds),$rand));

        return implode($this->lineSep,$line);
    }

    //格式解析
    public function resolve($codes)
    {
        return strtr($codes,array_flip($this->dxds));
    }

    //还原格式
    public function unresolve($codes)
    {
        return strtr($codes,$this->dxds);
    }

    public function regexp($sCodes)
    {
        $cols=implode('',array_keys($this->dxds));
        if(!preg_match(sprintf('/^([%s]\%s){0,3}[%s]\|([%s]\%s){0,3}[%s]$/',$cols,$this->codeSep,$cols,$cols,$this->codeSep,$cols),$sCodes)) return false;

        $filterArr = $this->dxds;

        $sCodes = explode($this->lineSep, $sCodes);
        foreach($sCodes as $codes){
            $temp = explode($this->codeSep,$codes);
            if(count($temp) != count(array_filter(array_unique($temp),function($v) use($filterArr) {
                    return isset($filterArr[$v]);
                }))) return false;

            if(count($temp)==0){
                return false;
            }
        }

        return true;
    }

    public function count($sCodes)
    {
        //n1*n2

        $temp = explode($this->lineSep,$sCodes);
        $n1 = count(explode($this->codeSep,$temp[0]));
        $n2 = count(explode($this->codeSep,$temp[1]));

        return $n1 * $n2;
    }

    //判定中奖
    public function assertLevel($levelId, $sCodes, Array $numbers)
    {
        //多注
        $aCodes = explode($this->lineSep, $sCodes);
        $aTemp1 = explode($this->codeSep, $aCodes[0]);
        $aTemp2 = explode($this->codeSep, $aCodes[1]);

        $bs1 = $numbers[0] > 4 ? 'b' : 's';
        $bs2 = $numbers[1] > 4 ? 'b' : 's';
        $ad1 = $numbers[0] % 2 == 0 ? 'd' : 'a';
        $ad2 = $numbers[1] % 2 == 0 ? 'd' : 'a';

        $arr = array(array($bs1, $ad1), array($bs2, $ad2));

        $i=0;
        $temp = [];
        foreach ($aTemp1 as $v1) {
            foreach ($aTemp2 as $v2) {
                if(isset($temp[$v1.'-'.$v2])) continue;
                if (in_array($v1, $arr[0]) && in_array($v2, $arr[1])) {
                    $temp[$v1.'-'.$v2]=1;
                    $i++;
                }
            }
        }

        return $i;
    }

}