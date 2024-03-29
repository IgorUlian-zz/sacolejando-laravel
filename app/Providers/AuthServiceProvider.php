<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Permission;
use App\Models\User;
use App\Models\Product;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {   
        $this->registerPolicies();

        $permissions = Permission::all();

        foreach($permissions as $permission){
            Gate::define($permission->permission_name, function(User $user) use ($permission) {
                return $user->hasPermission($permission->permission_name);
            });
        }

        Gate::define('owner', function(User $user, $object){
            return $user->id === $object->user_id;
        });

        Gate::before(function (User $user){
            if($user->isAdmin()) {
                return true;
            }
        });
    }
}
