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
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations/');
        
        $this->publishes([__DIR__ . '/database/seeds/' => base_path('database/seeds')], 'seeds');
    }
}
