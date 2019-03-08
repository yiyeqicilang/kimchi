<?php
namespace Qicilang\Kimchi\Lottery;

interface LotteryInterface
{
    public function getNumberNum();
    public function getNumberPosition();
    public function getMethodClasses();

    public function getLId();
    public function getMName();
}