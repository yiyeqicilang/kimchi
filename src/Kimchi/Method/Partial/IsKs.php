<?php namespace Qicilang\Kimchi\Method\Partial;

Trait IsKs {
    public function isKs()
    {
        return true;
    }

    public function getWholePosition()
    {
        return [0,1,2];
    }
}