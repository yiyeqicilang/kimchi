<?php namespace Qicilang\Kimchi\Method\Partial;

Trait IsLotto {
    public function isLotto()
    {
        return true;
    }

    public function getWholePosition()
    {
        return [0,1,2,4,5];
    }
}