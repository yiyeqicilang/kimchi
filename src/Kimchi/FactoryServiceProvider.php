<?php namespace Qicilang\Kimchi;

use Illuminate\Support\ServiceProvider;

class FactoryServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('kimchi', function ($app) {
            return new Factory($app);
        });
    }
}
