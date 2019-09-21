<?php

namespace LarExt\API;

use LarExt\API\Console\PanelDesktop;
use Illuminate\Support\ServiceProvider;
use LarExt\API\Controllers\LoginController;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('larextapi', function(){
            return new LarExtApi();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/migrations');

        if ($this->app->runningInConsole()) {
            $this->commands([
                PanelDesktop::class
            ]);
        }

    }
}
