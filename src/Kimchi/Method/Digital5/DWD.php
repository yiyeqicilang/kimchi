<?php namespace Qicilang\Kimchi\Method\Digital5;

use \Qicilang\Kimchi\Method\Partial\IsDigital5Dwd;

class DWD extends ZX1
{
    use IsDigital5Dwd;

    public function getMName()
    {
        return '定位胆';
    }
}