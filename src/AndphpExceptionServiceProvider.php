<?php

namespace AndPHP;

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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/andphp_error.php' => config_path('error_code.php'),
        ]);
    }
}
