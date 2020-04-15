<?php

namespace Lazy\LaravelSls;

use Aliyun\SLS\Client;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Lokielse\LaravelSLS\SLSLog;

class LaravelSlsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-sls');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-sls');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-sls.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-sls');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-sls', function ($app) {
            $config = $app['config']['config'];
            $accessKeyId        = Arr::get($config, 'access_key_id');
            $accessKeySecret    = Arr::get($config, 'access_key_secret');
            $endpoint           = Arr::get($config, 'endpoint');
            $project            = Arr::get($config, 'project');
            $store              = Arr::get($config, 'store');

            $client = new Client($endpoint, $accessKeyId, $accessKeySecret);

            $log = new LaravelSls($client);
            $log->setProject($project);
            $log->setLogStore($store);

            return $log;
        });
    }
}
