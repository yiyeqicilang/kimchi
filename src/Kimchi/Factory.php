<?php namespace Kimchi;

class Factory
{
    public $lotteries = [];

    public function getLotteryClasses()
    {
        return [
            'digital5' => Lottery\Digital5::class,
            'digital3' => Lottery\Digital3::class,
            'lotto' => Lottery\Lotto::class,
            'ks' => Lottery\Ks::class,
            'pk10' => Lottery\Pk10::class,
        ];
    }

    public function lottery($name)
    {
        if(!isset($this->lotteries[$name])){
            $classes = $this->getLotteryClasses();
            if(!isset($classes[$name])){
                throw new \Qicilang\Kimchi\Exception\LotteryException("lottery type:{$name} not support!");
            }
            $this->lotteries[$name] = new $classes[$name];
        }

        return $this->lotteries[$name];
    }

    public function showDigital5MethodClasses()
    {
        return $this->_showMethodClass(Lottery\Digital5::class);
    }
    public function showDigital3MethodClasses()
    {
        return $this->_showMethodClass(Lottery\Digital3::class);
    }
    public function showKsMethodClasses()
    {
        return $this->_showMethodClass(Lottery\Ks::class);
    }
    public function showLottoMethodClasses()
    {
        return $this->_showMethodClass(Lottery\Lotto::class);
    }
    public function showPk10MethodClasses()
    {
        return $this->_showMethodClass(Lottery\Pk10::class);
    }

    public function _showMethodClass($class)
    {
        $obj = new $class;

        $classes = $obj->getMethodClasses();
        $list=[];
        foreach($classes as $class){
            $m = new $class;
            $list[]= "'".$m->getMId()."' => \\{$class}::class,\n";
        }

        return $list;
    }
}