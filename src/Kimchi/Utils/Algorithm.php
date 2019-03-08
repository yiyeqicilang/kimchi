<?php
namespace Qicilang\Kimchi\Utils;

class Algorithm {
    public static $_abc=array(
        '01' => 'a',
        '02' => 'b',
        '03' => 'c',
        '04' => 'd',
        '05' => 'e',
        '06' => 'f',
        '07' => 'g',
        '08' => 'h',
        '09' => 'i',
        '10' => 'j',
        '11' => 'k',
    );

    //将lt01 转成 单字符 a b c,以便跟数字形统一逻辑
    static public function convertLtCodes($lt,$encode=true)
    {
        $keys = array_keys(self::$_abc);
        $values = array_values(self::$_abc);

        if($encode){
            if(is_array($lt)){
                foreach($lt as &$l){
                    $l = str_replace($keys,$values,$l);
                }

            }else{
                $lt = str_replace($keys,$values,$lt);
            }
        }else{
            if(is_array($lt)){
                foreach($lt as &$l){
                    $l = str_replace($values,$keys,$l);
                }
            }else{
                $lt = str_replace($values,$keys,$lt);
            }
        }

        return $lt;
    }

    static public function getCombination($aBaseArray, $iSelectNum)
    {
        $iBaseNum = count($aBaseArray);
        if ($iSelectNum > $iBaseNum) {
            return [];
        }
        if ($iSelectNum == 1) {
            return $aBaseArray;
        }
        if ($iBaseNum == $iSelectNum) {
            return array(implode(' ', $aBaseArray));
        }
        $sString = '';
        $sLastString = '';
        $sTempStr = '';
        $aResult = [];
        for ($i = 0; $i < $iSelectNum; $i++) {
            $sString .= '1';
            $sLastString .= '1';
        }
        for ($j = 0; $j < $iBaseNum - $iSelectNum; $j++) {
            $sString .= '0';
        }
        for ($k = 0; $k < $iSelectNum; $k++) {
            $sTempStr .= $aBaseArray[$k] . ' ';
        }
        $aResult[] = trim($sTempStr);
        $sTempStr = '';
        while (substr($sString, -$iSelectNum) != $sLastString) {
            $aString = explode('10', $sString, 2);
            $aString[0] = self::strOrder($aString[0], TRUE);
            $sString = $aString[0] . '01' . $aString[1];
            for ($k = 0; $k < $iBaseNum; $k++) {
                if ($sString{$k} == '1') {
                    $sTempStr .= $aBaseArray[$k] . ' ';
                }
            }
            $aResult[] = trim(substr($sTempStr, 0, -1));
            $sTempStr = '';
        }
        return $aResult;
    }

    static public function getCombinCount($iBaseNumber, $iSelectNumber)
    {
        if ($iSelectNumber > $iBaseNumber) {
            return 0;
        }
        if ($iBaseNumber == $iSelectNumber || $iSelectNumber == 0) {
            return 1; //全选
        }
        if ($iSelectNumber == 1) {
            return $iBaseNumber; //选一个数
        }
        $iNumerator = 1; //分子
        $iDenominator = 1; //分母
        for ($i = 0; $i < $iSelectNumber; $i++) {
            $iNumerator *= $iBaseNumber - $i; //n*(n-1)...(n-m+1)
            $iDenominator *= $iSelectNumber - $i; //(n-m)....*2*1
        }
        return $iNumerator / $iDenominator;
    }

    //字符排序
    static public function strOrder($sString = '', $bDesc = FALSE)
    {
        if ($sString == '') {
            return $sString;
        }
        $aString = str_split($sString);
        if ($bDesc) {
            rsort($aString);
        } else {
            sort($aString);
        }
        return implode('', $aString);
    }

    static public function _ArrayFlip($aArr)
    {
        if (empty($aArr) || !is_array($aArr)) {
            return $aArr;
        }
        $aNewArr = [];
        foreach ($aArr as $k => $v) {
            $aNewArr[$v][] = $k;
        }
        return $aNewArr;
    }

    static public function getRepeat($aCode, $iRepeats = 2)
    {
        $result = [];
        for ($ii = 0; $ii < sizeof($aCode); $ii++) {
            $tCode = explode(' ', $aCode[$ii]);
            $result[$ii] = '';
            for ($iii = 0; $iii < $iRepeats; $iii++) {
                $result[$ii] .= $tCode[$iii] . ' ' . $tCode[$iii] . ' ';
            }
        }
        return $result;
    }

    /* 组合 数 */
    static public function nCr($n, $r)
    {
        if ($r > $n) {
            return 0;
        }
        if (($n - $r) < $r) {
            return self::nCr($n, ($n - $r));
        }
        $return = 1;
        for ($i = 0; $i < $r; $i++) {
            $return *= ($n - $i) / ($i + 1);
        }
        return $return;
    }

    /* 排列 数 */
    static public function nPr($n, $r)
    {
        if ($r > $n) {
            return 0;
        }
        if ($r) {
            return $n * (self::nPr($n - 1, $r - 1));
        } else {
            return 1;
        }
    }
}