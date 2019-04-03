<?php namespace Qicilang\Kimchi\Method;

interface MethodInterface
{
    public function getMId();
    public function getMName();
    public function getDetail();
    public function getExample();

    public function isRx();
    public function isRxZxfs();
    public function isDigital5Dwd();
    public function isDigital3Dwd();
    public function isLottoDwd();
    public function isPk10Dwd();
    public function isJzjd();
    public function isMulti();
    public function isSingle();

    public function isDigital5();
    public function isDigital3();
    public function isKs();
    public function isPk10();
    public function isLotto();

    public function getWholePosition();

    public function randomCodes();
    public function regexp($codes);
    public function count($codes);
    public function assertLevel($levelId, $sCodes, Array $numbers);
}