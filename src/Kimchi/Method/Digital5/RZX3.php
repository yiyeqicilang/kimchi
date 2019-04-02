<?php namespace Qicilang\Kimchi\Method\Digital5;
use \Qicilang\Kimchi\Method\Partial\Rx;

class RZX3 extends ZX3
{
    use Rx;

    public function isRxZxfs()
    {
        return true;
    }
}