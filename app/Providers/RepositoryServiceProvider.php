<?php

namespace App\Providers;

use App\Contracts\PostRepositoryInterface;
use App\Contracts\RepositoryInterface;
use App\Contracts\GetRepositoryInterface;
use App\Contracts\SupplierRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\ContactRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProductDetailRepository;
use App\Repositories\ReasonContactRepository;
use App\Repositories\SupplierRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PostRepositoryInterface::class, ContactRepository::class);
        $this->app->bind(GetRepositoryInterface::class, ReasonContactRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(SupplierRepositoryInterface::class, SupplierRepository::class);
        $this->app->bind(RepositoryInterface::class, ProductRepository::class);
        $this->app->bind(RepositoryInterface::class, ProductDetailRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
