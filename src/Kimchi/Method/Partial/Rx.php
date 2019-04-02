<?php namespace Qicilang\Kimchi\Method\Partial;

Trait Rx {
    public function getMName()
    {
        return '任'.parent::getMName();
    }

    public function isRx()
    {
        return true;
    }
}