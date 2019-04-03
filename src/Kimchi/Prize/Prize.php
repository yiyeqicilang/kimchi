<?php namespace Qicilang\Kimchi\Prize;

use Qicilang\Kimchi\Exception\PrizeException;
use \Qicilang\Kimchi\Utils\Algorithm;

//奖金 奖金组处理
class Prize
{
    public $group = '';
    public $prizes = [];
    public function __construct($group)
    {
        $this->group = $group;
        $this->prizes = require(__DIR__."/../Config/prizegroup/{$group}.php");
    }
}