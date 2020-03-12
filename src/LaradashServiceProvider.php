<?php

namespace JovertPalonpon\Laradash;

use Illuminate\Support\ServiceProvider;

class LaradashServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/laradash.php' => config_path('laradash.php')
        ], 'config');
    }
}
