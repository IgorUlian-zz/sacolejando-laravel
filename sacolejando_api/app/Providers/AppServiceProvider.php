<?php

namespace App\Providers;

use App\Models\Plan;
use App\Models\Profile;
use App\Observers\PlanObserver;
use App\Observers\ProfileObserver;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Profile::observe(ProfileObserver::class);
        Plan::observe(PlanObserver::class);
    }
}
