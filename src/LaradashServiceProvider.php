<?php

namespace JovertPalonpon\Laradash;

use Illuminate\Support\ServiceProvider;
use JovertPalonpon\Laradash\Console\InstallCommand;

class LaradashServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPublishables();
        $this->registerCommands();
    }

    /**
     * Register console commands.
     *
     * @return void
     */
    private function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }

    /**
     * Register publishable resources.
     * 
     * @return void
     */
    private function registerPublishables()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/laradash.php' => config_path('laradash.php')
            ], 'laradash-config');

            $this->publishes([
                __DIR__.'/../public' => public_path('vendor/laradash'),
            ], 'laradash-assets');
        }
    }
}
