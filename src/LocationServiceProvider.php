<?php

namespace Woodoocoder\LaravelLocation;

use Illuminate\Support\ServiceProvider;

class LocationServiceProvider extends ServiceProvider {

    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        include __DIR__.'/routes/api.php';
        $this->app->make('Woodoocoder\LaravelLocation\LocationController');

        $this->commands([
            \Woodoocoder\LaravelLocation\Console\InitCommand::class,
        ]);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        $this->mergeConfigFrom(__DIR__ .'/config/config.php', 'woodoocoder.location');
        $this->publishes([__DIR__ .'/config/config.php' => config_path('woodoocoder/location.php')], 'location-config');
        
        $this->loadMigrationsFrom(__DIR__.'/database/migrations/');
        
        $this->publishes([__DIR__ . '/database/seeds/' => base_path('database/seeds')], 'location-seeds');
        
    }
}
