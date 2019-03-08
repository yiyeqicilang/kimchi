<?php namespace Kimchi\Method\Lotto;

//DWD 需分拆
class LTDWD extends LTZX1
{
    public function isDwd()
    {
        return true;
    }

    public function getMName()
    {
        return '定位胆';
    }
}