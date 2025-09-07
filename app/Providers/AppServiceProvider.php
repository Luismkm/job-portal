<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('company', function(){
            return auth()->user()->role === 'company';
        });

        Gate::define('rh', function(){
            return auth()->user()->role === 'rh';
        });
    }
}
