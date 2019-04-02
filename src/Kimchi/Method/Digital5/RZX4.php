<?php namespace Qicilang\Kimchi\Method\Digital5;
use \Qicilang\Kimchi\Method\Partial\Rx;

class RZX4 extends ZX4
{
    use Rx;

    public function isRxZxfs()
    {
        return true;
    }
}