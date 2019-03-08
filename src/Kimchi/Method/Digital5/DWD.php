<?php namespace Kimchi\Method\Digital5;

//DWD 需分拆
class DWD extends ZX1
{
    public function getMName()
    {
        return '定位胆';
    }

    public function isDwd()
    {
        return true;
    }
}