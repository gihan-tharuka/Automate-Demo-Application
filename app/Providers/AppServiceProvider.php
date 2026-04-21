<?php

namespace App\Providers;

use App\Models\Service;
use App\Observers\ServiceObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register Service observer for image compression
        Service::observe(ServiceObserver::class);

        // Invoice observer has been replaced by Filament resource hooks
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
