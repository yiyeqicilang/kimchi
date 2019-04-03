<?php namespace Qicilang\Kimchi\Method\Digital3;

use \Qicilang\Kimchi\Method\Partial\IsDigital3;
use \Qicilang\Kimchi\Method\Partial\IsDigital3Dwd;

class DWD extends \Qicilang\Kimchi\Method\Digital5\DWD
{
    use IsDigital3,IsDigital3Dwd;
}