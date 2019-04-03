<?php namespace Qicilang\Kimchi\Method\Partial;

Trait IsPk10 {
    public function isPk10()
    {
        return true;
    }

    public function getWholePosition()
    {
        return [0,1,2,3,4,5,6,7,8,9];
    }
}