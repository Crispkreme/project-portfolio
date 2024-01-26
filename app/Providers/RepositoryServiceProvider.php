<?php

namespace App\Providers;

// CONTRACTS
use App\Contracts\AboutContract;
use App\Contracts\PortfolioContract;

// REPOSITORY
use App\Repositories\AboutRepository;
use App\Repositories\PortfolioRepository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        AboutContract::class => AboutRepository::class,
        PortfolioContract::class => PortfolioRepository::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        foreach($this->repositories as $contract => $repository) {
            $this->app->singleton($contract,$repository);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}