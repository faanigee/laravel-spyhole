<?php

namespace Faanigee\LaravelSpyhole;

use Illuminate\Support\ServiceProvider;

class LaravelSpyholeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-spyhole');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-spyhole');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/laravel-spyhole.php' => config_path('laravel-spyhole.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-spyhole'),
            ], 'views');*/

            // Publishing assets.
            $this->publishes([
                __DIR__ . '/../resources/assets' => public_path('vendor/laravel-spyhole'),
            ], 'assets');

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-spyhole'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-spyhole.php', 'laravel-spyhole');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-spyhole', function () {
            return new LaravelSpyhole();
        });
    }
}
