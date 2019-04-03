<?php namespace Qicilang\Kimchi\Method\Pk10;
use \Qicilang\Kimchi\Method\Partial\IsPk10Dwd;

class PK10_DWD extends PK10_ZX1
{
    use IsPk10Dwd;

    public function getMName()
    {
        return '定位胆';
    }
}