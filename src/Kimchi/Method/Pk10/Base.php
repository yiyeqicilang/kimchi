<?php namespace Qicilang\Kimchi\Method\Pk10;

use \Qicilang\Kimchi\Method\Partial\IsPk10;

abstract class Base extends \Qicilang\Kimchi\Method\Method
{
    use IsPk10;

    public $filterArr = ['01'=>1, '02'=>1, '03'=>1, '04'=>1, '05'=>1, '06'=>1, '07'=>1, '08'=>1, '09'=>1, '10'=>1];
}