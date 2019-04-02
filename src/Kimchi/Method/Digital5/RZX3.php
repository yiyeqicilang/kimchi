<?php namespace Qicilang\Kimchi\Method\Digital5;
use \Qicilang\Kimchi\Method\Partial\IsRx;
use \Qicilang\Kimchi\Method\Partial\IsRxZxfs;
class RZX3 extends ZX3
{
    use IsRx,IsRxZxfs;

    public function isRxZxfs()
    {
        return true;
    }
}