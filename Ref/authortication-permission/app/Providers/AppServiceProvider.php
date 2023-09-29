<?php

namespace App\Providers;

use App\Http\Services\MusicService;
use Illuminate\Support\ServiceProvider;
use App\Http\Services\ProductService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->singleton(ProductService::class, ProductService::class);
        $this->app->singleton(MusicService::class, MusicService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
