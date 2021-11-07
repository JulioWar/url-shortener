<?php

namespace App\Providers;

use App\Contracts\SiteVisitRepositoryContract;
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
        $this->app->singleton(SiteVisitRepositoryContract::class, SiteVisitRepository::class);
        $this->app->singleton(AliasGeneratorContract::class, AliasGenerator::class);
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
