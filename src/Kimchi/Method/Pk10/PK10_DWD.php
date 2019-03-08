<?php namespace Qicilang\Kimchi\Method\Pk10;

class PK10_DWD extends PK10_ZX1
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