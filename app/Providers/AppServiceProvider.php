<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Client;
use App\Models\Food;
use App\Models\Plan;
use App\Models\Profile;
use App\Models\Role;
use App\Models\Tenant;
use App\Observers\CategoryObserver;
use App\Observers\ClientObserver;
use App\Observers\FoodObserver;
use App\Observers\PlanObserver;
use App\Observers\ProfileObserver;
use App\Observers\RoleObserver;
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
         if (class_exists(TelescopeApplicationServiceProvider::class)) {
             $this->app->register(TelescopeServiceProvider::class);
         }
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
        Role::observe(RoleObserver::class);
        Client::observe(ClientObserver::class);


    }
}
