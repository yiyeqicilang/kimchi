<?php namespace Qicilang\Kimchi\Method\Digital5;
use \Qicilang\Kimchi\Method\Partial\IsRx;
use \Qicilang\Kimchi\Method\Partial\IsRxZxfs;
class RZX4 extends ZX4
{
    use IsRx,IsRxZxfs;

    public function isRxZxfs()
    {
        return true;
    }
}