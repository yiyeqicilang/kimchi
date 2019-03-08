<?php namespace Qicilang\Kimchi\Method\Pk10;

abstract class Base extends \Qicilang\Kimchi\Method\Method
{
    public $filterArr = ['01'=>1, '02'=>1, '03'=>1, '04'=>1, '05'=>1, '06'=>1, '07'=>1, '08'=>1, '09'=>1, '10'=>1];

    public function isLotto()
    {
        return true;
    }
}