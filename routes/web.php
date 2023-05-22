<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CategoryFoodController;
use App\Http\Controllers\admin\FoodController;
use App\Http\Controllers\Admin\FoodOrderController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\PermissionProfileController;
use App\Http\Controllers\Admin\PermissionRoleController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\PlanProfileController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\admin\TenantController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\Admin\RoleUserController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')
        ->namespace('Admin')
        ->middleware('auth')
        ->group(function() {

    /**
     * route orders
     */
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');

    /**
     * route plans
     */
    Route::put('plans/{url}', [PlanController::class, 'update'])->name('plans.update');
    Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
    Route::post('plans/store', [PlanController::class, 'store'])->name('plans.store');
    Route::delete('plans/{url}', [PlanController::class, 'delete'])->name('plans.delete');

    Route::get('plans/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::get('plans/index', [PlanController::class, 'index'])->name('plans.index');
    Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::get('plans/{url}', [PlanController::class, 'details'])->name('plans.details');


    /**
     * route permissions
     */
    Route::put('permissions/{url}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::any('permissions/search', [PermissionController::class, 'search'])->name('permissions.search');
    Route::post('permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
    Route::delete('permissions/{url}', [PermissionController::class, 'delete'])->name('permissions.delete');
    
    Route::get('permissions/{url}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::get('permissions/index', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::get('permissions/{url}', [PermissionController::class, 'details'])->name('permissions.details');


    /**
     * route role
     */
    Route::put('roles/{url}', [RoleController::class, 'update'])->name('roles.update');
    Route::any('roles/search', [RoleController::class, 'search'])->name('roles.search');
    Route::post('roles/store', [RoleController::class, 'store'])->name('roles.store');
    Route::delete('roles/{url}', [RoleController::class, 'delete'])->name('roles.delete');
    
    Route::get('roles/{url}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::get('roles/index', [RoleController::class, 'index'])->name('roles.index');
    Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::get('roles/{url}', [RoleController::class, 'details'])->name('roles.details');

    
    /**
     * route profile
     */
    Route::put('profiles/{url}', [ProfileController::class, 'update'])->name('profiles.update');
    Route::any('profiles/search', [ProfileController::class, 'search'])->name('profiles.search');
    Route::post('profiles/store', [ProfileController::class, 'store'])->name('profiles.store');
    Route::delete('profiles/{url}', [ProfileController::class, 'delete'])->name('profiles.delete');
    
    Route::get('profiles/{url}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
    Route::get('profiles/index', [ProfileController::class, 'index'])->name('profiles.index');
    Route::get('profiles/create', [ProfileController::class, 'create'])->name('profiles.create');
    Route::get('profiles/{url}', [ProfileController::class, 'details'])->name('profiles.details');


    /**
     * route users
     */
     Route::put('users/{url}', [UserController::class, 'update'])->name('users.update');
     Route::any('users/search', [UserController::class, 'search'])->name('users.search');
     Route::post('users/store', [UserController::class, 'store'])->name('users.store');
     Route::delete('users/{url}', [UserController::class, 'delete'])->name('users.delete');
 
     Route::get('users/{url}/edit', [UserController::class, 'edit'])->name('users.edit');
     Route::get('users/index', [UserController::class, 'index'])->name('users.index');
     Route::get('users/create', [UserController::class, 'create'])->name('users.create');
     Route::get('users/{url}', [UserController::class, 'details'])->name('users.details');


      /**
     * route categories
     */
    Route::put('categories/{url}', [CategoryController::class, 'update'])->name('categories.update');
    Route::any('categories/search', [CategoryController::class, 'search'])->name('categories.search');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('categories/{url}', [CategoryController::class, 'delete'])->name('categories.delete');

    Route::get('categories/{url}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::get('categories/index', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('categories/{url}', [CategoryController::class, 'details'])->name('categories.details');
    

    /*
    * route foods
    */
    Route::put('foods/{url}', [FoodController::class, 'update'])->name('foods.update');
    Route::any('foods/search', [FoodController::class, 'search'])->name('foods.search');
    Route::post('foods/store', [FoodController::class, 'store'])->name('foods.store');
    Route::delete('foods/{url}', [FoodController::class, 'delete'])->name('foods.delete');

    Route::get('foods/{url}/edit', [FoodController::class, 'edit'])->name('foods.edit');
    Route::get('foods/index', [FoodController::class, 'index'])->name('foods.index');
    Route::get('foods/create', [FoodController::class, 'create'])->name('foods.create');
    Route::get('foods/{url}', [FoodController::class, 'details'])->name('foods.details');


    /**
     * route tenants
     */
    Route::put('tenants/{url}', [TenantController::class, 'update'])->name('tenants.update');
    Route::any('tenants/search', [TenantController::class, 'search'])->name('tenants.search');
    Route::post('tenants/store', [TenantController::class, 'store'])->name('tenants.store');
    Route::delete('tenants/{url}', [TenantController::class, 'delete'])->name('tenants.delete');

    Route::get('tenants/{url}/edit', [TenantController::class, 'edit'])->name('tenants.edit');
    Route::get('tenants/index', [TenantController::class, 'index'])->name('tenants.index');
    Route::get('tenants/create', [TenantController::class, 'create'])->name('tenants.create');
    Route::get('tenants/{url}', [TenantController::class, 'details'])->name('tenants.details');


    /**
     * profiles x permissions
     */
    Route::get('profiles/{id}/permission/{idPermission}/detach', [PermissionProfileController::class, 'detachPermissionsProfile'] )->name('profiles.permission.detach');
    Route::post('profiles/{id}/permissions', [PermissionProfileController::class, 'attachPermissionsProfile'] )->name('profiles.permissions.attach');
    Route::any('profiles/{id}/permissions/create', [PermissionProfileController::class, 'permissionsAvailable'])->name('profiles.permissions.available');
    Route::get('profiles/{id}/permissions', [PermissionProfileController::class, 'permissions'] )->name('profiles.permissions');
    Route::get('permissions/{id}/profiles', [PermissionProfileController::class, 'profiles'] )->name('permissions.profiles');


    /**
     * roles x permissions
     */
    Route::get('roles/{id}/permission/{idPermission}/detach', [PermissionRoleController::class, 'detachPermissionsProfile'] )->name('roles.permission.detach');
    Route::post('roles/{id}/permissions', [PermissionRoleController::class, 'attachPermissionsProfile'] )->name('roles.permissions.attach');
    Route::any('roles/{id}/permissions/create', [PermissionRoleController::class, 'permissionsAvailable'])->name('roles.permissions.available');
    Route::get('roles/{id}/permissions', [PermissionRoleController::class, 'permissions'] )->name('roles.permissions');
    Route::get('permissions/{id}/roles', [PermissionRoleController::class, 'roles'] )->name('permissions.roles');


     /**
     * users x permissions
     */
    Route::get('users/{id}/role/{idRole}/detach', [RoleUserController::class, 'detachRolesUser'] )->name('users.role.detach');
    Route::post('users/{id}/roles', [RoleUserController::class, 'attachRolesUser'] )->name('users.roles.attach');
    Route::any('users/{id}/roles/create', [RoleUserController::class, 'rolesAvailable'])->name('users.roles.available');
    Route::get('users/{id}/roles', [RoleUserController::class, 'roles'] )->name('users.roles');
    Route::get('roles/{id}/users', [RoleUserController::class, 'users'] )->name('roles.users');


     /**
     * plans x profiles
     */
    Route::get('plans/{id}/profile/{idProfile}/detach', [PlanProfileController::class, 'detachProfilePlan'] )->name('plans.profiles.detach');
    Route::post('plans/{id}/profiles', [PlanProfileController::class, 'attachProfilesPlan'] )->name('plans.profiles.attach');
    Route::any('plans/{id}/profiles/create', [PlanProfileController::class, 'profilesAvailable'])->name('plans.profiles.available');
    Route::get('plans/{id}/profiles', [PlanProfileController::class, 'profiles'] )->name('plans.profiles');
    Route::get('profiles/{id}/plans', [PlanProfileController::class, 'plans'] )->name('profiles.plans');
    
    
    /**
     * food x Category
     */
    Route::get('foods/{id}/category/{idCategory}/detach', [CategoryFoodController::class, 'detachCategoriesFood'] )->name('foods.category.detach');
    Route::post('foods/{id}/categories', [CategoryFoodController::class, 'attachCategoriesFood'] )->name('foods.categories.attach');
    Route::any('foods/{id}/categories/create', [CategoryFoodController::class, 'categoriesAvailable'])->name('foods.categories.available');
    Route::get('foods/{id}/categories', [CategoryFoodController::class, 'categories'] )->name('foods.categories');
    Route::get('categories/{id}/foods', [CategoryFoodController::class, 'foods'] )->name('categories.foods');

   /*
  *foodOrders
  */
  Route::get('orders/index', [OrderController::class, 'index'])->name('orders.index');
  Route::any('orders/search', [OrderController::class, 'search'])->name('orders.search');
  Route::get('orders/{identify}', [OrderController::class, 'details'])->name('orders.details');   
  Route::get('orders/foodDetails/{identify}', [OrderController::class, 'foodDetails'])->name('orders.foodDetails');
  Route::get('orders/{url}/edit', [OrderController::class, 'edit'])->name('orders.edit');
  Route::put('orders/{url}', [OrderController::class, 'update'])->name('orders.update');
  Route::post('orders/store', [OrderController::class, 'store'])->name('orders.store');
  Route::post('orders/create', [OrderController::class, 'create'])->name('orders.create');



  /*
  * Home dashboard
  */
    Route::get('', [HomeController::class, 'home'])->name('admin.index');

});



 /*
  * Home plans
  */
  Route::get('/', [SiteController::class, 'index'])->name('site.home');
  Route::get('/plan/{url}', [SiteController::class, 'plan'])->name('plan.subscription');

/**
 * Auth Routes
 */

Auth::routes();