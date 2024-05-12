<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\SubService;
use App\Observers\SubServiceObserver;

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
        SubService::observe(SubServiceObserver::class);
    }
}
