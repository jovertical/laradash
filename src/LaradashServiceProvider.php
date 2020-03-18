<?php

namespace JovertPalonpon\Laradash;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
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
        if (!config('laradash.enabled')) {
            return;
        }

        $this->registerPublishables();
        $this->registerCommands();
        $this->registerRoutes();
        $this->registerViews();
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/laradash.php',
            'laradash'
        );
    }

    /**
     * Register package views.
     *
     * @return void
     */
    private function registerViews()
    {
        Inertia::setRootView('laradash::app');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laradash');
    }

    /**
     * Register package routes.
     *
     * @return void
     */
    private function registerRoutes()
    {
        Route::group([
            'namespace' => 'JovertPalonpon\Laradash\Http\Controllers',
            'prefix' => config('laradash.path'),
            'middleware' => 'web'
        ], function () {
            $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');
        });
    }

    /**
     * Register package's console commands.
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
     * Register package's publishable resources.
     *
     * @return void
     */
    private function registerPublishables()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/laradash.php' => config_path('laradash.php'),
            ], 'laradash-config');

            $this->publishes([
                __DIR__ . '/../public' => public_path('vendor/laradash'),
            ], 'laradash-assets');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/laradash'),
            ], 'laradash-views');
        }
    }
}
