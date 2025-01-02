<?php

namespace App\Providers;

// use Illuminate\Contracts\Foundation\MaintenanceMode;
// use Illuminate\Foundation\Console\MaintenanceModeManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Binding MaintenanceMode interface to a concrete implementation
        // $this->app->singleton(MaintenanceMode::class, function ($app) {
        //     return $app->make(MaintenanceModeManager::class);
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // You can add any necessary bootstrap logic here
    }
}
