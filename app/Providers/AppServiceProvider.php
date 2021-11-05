<?php

namespace App\Providers;

use App\Contracts\SiteVisitRepositoryContract;
use App\Repositories\SiteVisitRepository;
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
        $this->app->bind(SiteVisitRepositoryContract::class, SiteVisitRepository::class);
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
