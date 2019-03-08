<?php namespace Qicilang\Kimchi\Facades;

use Illuminate\Support\Facades\Facade;

class Kimchi extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'kimchi';
    }
}
