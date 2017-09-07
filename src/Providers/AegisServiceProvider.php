<?php

namespace Rewake\Aegis\Providers;


use Rewake\Aegis\Services\AegisService;

class AegisServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->configure('aegis');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('aegis.config', function ($app) {

            // Return Aegis config or empty array
            return config('config.aegis') ?: [];
        });

        $this->app->singleton('aegis', function ($app) {

            $aegis = new AegisService(
                config('aegis.config')
            );

            return $aegis;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'aegis',
            'aegis.config'
        ];
    }
}