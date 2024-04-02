<?php

namespace App\Providers;

use App\Contracts\SliderContract;
use App\Contracts\AboutContract;

use App\Repositories\SliderRepository;
use App\Repositories\AboutRepository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        SliderContract::class => SliderRepository::class,
        AboutContract::class => AboutRepository::class,
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
