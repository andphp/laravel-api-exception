<?php

namespace AndPHP\LaravelApiException;

use Illuminate\Support\ServiceProvider;

abstract class AndphpExceptionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([ __DIR__.'/config/errorCode.php' => config_path('errorCode.php')],'config');
    }
}
