<?php

namespace Lazy\LaravelSls;

use Aliyun\SLS\Client;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Lokielse\LaravelSLS\SLSLog;

class LaravelSlsServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
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
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'sls');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-sls', function () {
            $config = config('sls');

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

        $this->app->alias(LaravelSls::class, 'sls');
    }

    public function provides()
    {
        return [LaravelSls::class, 'sls'];
    }
}
