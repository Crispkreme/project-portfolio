<?php

namespace App\Providers;

// CONTRACTS
use App\Contracts\AboutContract;
use App\Contracts\PortfolioContract;
use App\Contracts\BlogCategoryContract;
use App\Contracts\BlogContract;
use App\Contracts\ContactDetailContract;
use App\Contracts\ContactContract;

// REPOSITORY
use App\Repositories\AboutRepository;
use App\Repositories\PortfolioRepository;
use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogRepository;
use App\Repositories\ContactDetailRepository;
use App\Repositories\ContactRepository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        AboutContract::class => AboutRepository::class,
        PortfolioContract::class => PortfolioRepository::class,
        BlogCategoryContract::class => BlogCategoryRepository::class,
        BlogContract::class => BlogRepository::class,
        ContactDetailContract::class => ContactDetailRepository::class,
        ContactContract::class => ContactRepository::class,
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