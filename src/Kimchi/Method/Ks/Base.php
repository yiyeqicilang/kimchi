<?php namespace Qicilang\Kimchi\Method\Ks;

use \Qicilang\Kimchi\Method\Partial\IsKs;

abstract class Base extends \Qicilang\Kimchi\Method\Method
{
    use IsKs;

    public $filterArr = ['1' => 1, '2' => 1, '3' => 1, '4' => 1, '5' => 1, '6' => 1];

    public $eth = ['1' => '11', '2' => '22', '3' => '33', '4' => '44', '5' => '55', '6' => '66'];
    public $ethfx = ['1' => '11*', '2' => '22*', '3' => '33*', '4' => '44*', '5' => '55*', '6' => '66*'];

    public $kshz = ['3' => 1, '4' => 1, '5' => 1, '6' => 1, '7' => 1, '8' => 1, '9' => 1, '10' => 1, '11' => 1, '12' => 1, '13' => 1, '14' => 1, '15' => 1, '16' => 1, '17' => 1, '18' => 1];

    public $sbthhz = ['6' => 1, '7' => 1, '8' => 2, '9' => 3, '10' => 3, '11' => 3, '12' => 3, '13' => 2, '14' => 1, '15' => 1];

    public $slh = ['123' => 1, '234' => 1, '345' => 1, '456' => 1];

    public $sth = ['1' => '111', '2' => '222', '3' => '333', '4' => '444', '5' => '555', '6' => '666'];

    public $tx = ['t' => '通选'];
}