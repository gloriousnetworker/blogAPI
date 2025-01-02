<?php

namespace App\Providers;

use Illuminate\Contracts\Foundation\MaintenanceMode;
use Illuminate\Foundation\Console\MaintenanceModeManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Bind the MaintenanceMode interface to its implementation
        $this->app->bind(MaintenanceMode::class, MaintenanceModeManager::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Any necessary boot logic can be added here
    }
}
