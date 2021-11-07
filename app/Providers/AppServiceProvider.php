<?php

namespace App\Providers;

use App\Contracts\ShortUrlRepositoryContract;
use App\Contracts\SiteVisitRepositoryContract;
use App\Repositories\ShortUrlRepository;
use App\Repositories\SiteVisitRepository;
use App\Services\AliasGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Services
        $this->app->singleton(AliasGeneratorContract::class, AliasGenerator::class);

        // Repositories
        $this->app->singleton(SiteVisitRepositoryContract::class, SiteVisitRepository::class);
        $this->app->singleton(ShortUrlRepositoryContract::class, function() {
            return new ShortUrlRepository($this->app->make(AliasGeneratorContract::class));
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
