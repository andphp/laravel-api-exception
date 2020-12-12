<?php

namespace AndPHP\LaravelApiException;

use Illuminate\Support\ServiceProvider;

class AndphpExceptionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ApiException::class, function () {
            return new ApiException();
        });

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/errorCode.php' => config_path('errorCode.php'),
        ]);
    }
}
