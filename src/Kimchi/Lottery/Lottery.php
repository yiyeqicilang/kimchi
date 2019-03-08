<?php
namespace Kimchi\Lottery;

abstract class Lottery implements LotteryInterface
{
    public $methods = [];

    public function method($name)
    {
        if(!isset($this->methods[$name])){
            $classes = $this->getMethodClasses();
            if(!isset($classes[$name])){
                throw new \Kimchi\Exception\MethodException("method type:{$name} not support!");
            }
            $this->methods[$name] = new $classes[$name];
        }

        return $this->methods[$name];
    }

    public function getNumberNum()
    {
        return count($this->getNumberPosition());
    }
}