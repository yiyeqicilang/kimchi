<?php namespace Qicilang\Kimchi\Method\Digital5;

use \Qicilang\Kimchi\Method\Partial\IsDigitalDwd;

class DWD extends ZX1
{
    use IsDigitalDwd;

    public function getMName()
    {
        return '定位胆';
    }
}