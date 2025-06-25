<?php

namespace App\Providers;

use App\Contracts\ContactRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\ContactRepository;
use App\Repositories\UserRepository;
use App\Contracts\ReasonContactRepositoryInterface;
use App\Repositories\ReasonContactRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
        $this->app->bind(ReasonContactRepositoryInterface::class, ReasonContactRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
