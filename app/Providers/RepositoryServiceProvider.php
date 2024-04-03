<?php

namespace App\Providers;

use App\Contracts\AboutContract;
use App\Contracts\ExperienceContract;
use App\Contracts\SkillContract;
use App\Contracts\SliderContract;

use App\Repositories\AboutRepository;
use App\Repositories\ExperienceRepository;
use App\Repositories\SkillRepository;
use App\Repositories\SliderRepository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        SliderContract::class => SliderRepository::class,
        AboutContract::class => AboutRepository::class,
        SkillContract::class => SkillRepository::class,
        ExperienceContract::class => ExperienceRepository::class,
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
