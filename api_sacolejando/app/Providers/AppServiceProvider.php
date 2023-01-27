<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Food;
use App\Models\Plan;
use App\Models\Profile;
use App\Models\Tenant;
use App\Observers\CategoryObserver;
use App\Observers\FoodObserver;
use App\Observers\PlanObserver;
use App\Observers\ProfileObserver;
use App\Observers\TenantObserver;
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
        Plan::observe(PlanObserver::class);
        Profile::observe(ProfileObserver::class);
        Tenant::observe(TenantObserver::class);
        Category::observe(CategoryObserver::class);
        Food::observe(FoodObserver::class);

    }
}
