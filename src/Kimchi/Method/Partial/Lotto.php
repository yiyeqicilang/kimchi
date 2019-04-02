<?php namespace Qicilang\Kimchi\Method\Partial;

Trait Lotto {
    public function isLotto()
    {
        return true;
    }

    public function getAllPosition()
    {
        return [0,1,2,4,5];
    }
}