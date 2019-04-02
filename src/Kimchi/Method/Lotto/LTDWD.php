<?php namespace Qicilang\Kimchi\Method\Lotto;

use \Qicilang\Kimchi\Method\Partial\IsLottoDwd;

//DWD 需分拆
class LTDWD extends LTZX1
{
    use IsLottoDwd;

    public function getMName()
    {
        return '定位胆';
    }
}