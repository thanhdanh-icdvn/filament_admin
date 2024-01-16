<?php

namespace App\Providers;

use App\Repositories\Interfaces\ProductCategoryRepositoryInterface;
use App\Repositories\ProductCategoryRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->singleton(ProductCategoryRepositoryInterface::class, ProductCategoryRepository::class);
    }
}
