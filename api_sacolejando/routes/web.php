<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CategoryFoodController;
use App\Http\Controllers\admin\FoodController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\PermissionProfileController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\admin\UserController;
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
     * route plans
     */
    Route::get('/', [PlanController::class, 'index'])->name('plans.admin');

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
     * route profile
     */
    Route::put('profiles/{url}', [ProfileController::class, 'update'])->name('profiles.update');
    Route::any('profiles/search', [ProfileController::class, 'search'])->name('profiles.search');
    Route::post('profiles/store', [ProfileController::class, 'store'])->name('profiles.store');
    Route::delete('profiles/{url}', [ProfileController::class, 'delete'])->name('profiles.delete');
    
    Route::get('/', [ProfileController::class, 'index'])->name('profiles.admin');
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
     * profiles x permissions
     */
    Route::get('profiles/{id}/permission/{idPermission}/detach', [PermissionProfileController::class, 'detachPermissionsProfile'] )->name('profiles.permission.detach');
    Route::post('profiles/{id}/permissions', [PermissionProfileController::class, 'attachPermissionsProfile'] )->name('profiles.permissions.attach');
    Route::any('profiles/{id}/permissions/create', [PermissionProfileController::class, 'permissionsAvailable'])->name('profiles.permissions.available');
    Route::get('profiles/{id}/permissions', [PermissionProfileController::class, 'permissions'] )->name('profiles.permissions');
    Route::get('permissions/{id}/profiles', [PermissionProfileController::class, 'profiles'] )->name('permissions.profiles');

     /**
     * profiles x plans
     */
    Route::get('profiles/{id}/permission/{idPlan}/detach', [PermissionProfileController::class, 'detachPermissionsProfile'] )->name('profiles.permission.detach');
    Route::post('profiles/{id}/plans', [PermissionProfileController::class, 'attachPermissionsProfile'] )->name('profiles.plans.attach');
    Route::any('profiles/{id}/plans/create', [PermissionProfileController::class, 'plansAvailable'])->name('profiles.plans.available');
    Route::get('profiles/{id}/plans', [PermissionProfileController::class, 'plans'] )->name('profiles.plans');
    Route::get('plans/{id}/profiles', [PermissionProfileController::class, 'profiles'] )->name('plans.profiles');

    /**
     * food x Category
     */
    Route::get('foods/{id}/category/{idCategory}/detach', [CategoryFoodController::class, 'detachCategoriesFood'] )->name('foods.category.detach');
    Route::post('foods/{id}/categories', [CategoryFoodController::class, 'attachCategoriesFood'] )->name('foods.categories.attach');
    Route::any('foods/{id}/categories/create', [CategoryFoodController::class, 'categoriesAvailable'])->name('foods.categories.available');
    Route::get('foods/{id}/categories', [CategoryFoodController::class, 'categories'] )->name('foods.categories');
    Route::get('categories/{id}/foods', [CategoryFoodController::class, 'foods'] )->name('categories.foods');

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