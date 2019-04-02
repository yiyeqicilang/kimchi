<?php namespace Qicilang\Kimchi\Method\Digital5;
use \Qicilang\Kimchi\Method\Partial\Rx;

class RZX2 extends ZX2
{
    use Rx;

    public function isRxZxfs()
    {
        return true;
    }
}