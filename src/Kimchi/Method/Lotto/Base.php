<?php namespace Kimchi\Method\Lotto;

abstract class Base extends \Kimchi\Method\Method
{
    public $filterArr = array('01' => 1, '02' => 1, '03' => 1, '04' => 1, '05' => 1, '06' => 1, '07' => 1, '08' => 1, '09' => 1, '10' => 1, '11' => 1);

    public $czw = array('3' => '03', '4' => '04', '5' => '05', '6' => '06', '7' => '07', '8' => '08', '9' => '09');

    public $dds = array('5' => '5单0双', '4' => '4单1双', '3' => '3单2双', '2' => '2单3双', '1' => '1单4双', '0' => '0单5双');

    public function isLotto()
    {
        return true;
    }

    /**
     * @param $sCodes
     * @param $iLen [6,7,8]
     * @return array
     */
    public function getDtCodes($sCodes,$iLen)
    {
        $aTmp = explode($this->lineSep, $sCodes);
        $aDan = explode($this->codeSep, $aTmp[0]);
        $aTuo = explode($this->codeSep, $aTmp[1]);
        $aTuoCombins = Algorithm::getCombination($aTuo, $iLen - count($aDan));
        $aCode = [];
        foreach ($aTuoCombins as $at) {
            $aTp = array_merge($aDan, explode(' ', $at));
            sort($aTp);
            $aCode[] = implode(' ', $aTp);
        }
        $aTemp = [];
        foreach ($aCode as $ac) {
            $acTmp = explode(' ', $ac);
            $aCom = Algorithm::getCombination($acTmp, 5);
            foreach ($aCom as $sNum) {
                $aTemp[$sNum] = isset($aTemp[$sNum]) ? $aTemp[$sNum] + 1 : 1;
            }
        }

        $codes=[];
        $aCode = Algorithm::_ArrayFlip($aTemp);
        foreach ($aCode as $k => $v) {
            foreach($v as $c){
                $codes[$c]=1;
            }
        }

        return array_keys($codes);
    }
}