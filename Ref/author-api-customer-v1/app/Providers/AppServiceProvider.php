<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ICustomerRepository;
use App\Repositories\Impl\CustomerRepository;
use App\Services\ICustomerService;
use App\Services\Impl\CustomerService;

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
        $this->app->singleton(ICustomerRepository::class, CustomerRepository::class);
        $this->app->singleton(ICustomerService::class, CustomerService::class);
    }
}
