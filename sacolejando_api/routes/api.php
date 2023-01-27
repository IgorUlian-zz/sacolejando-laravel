<?php

use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\DeliveryUserController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\SellerUserController;
use App\Http\Controllers\Api\StateController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\userRestaurantsController;
use App\Models\userRestaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('admin/profile', [AdminProfileController::class, 'index'])->name('profile.index');


/*//* USER 
Route::get('user/all', [UserController::class, 'getAllUser'])->name('usuarios.all');
Route::get('user/single/{id}', [UserController::class, "getSingleUser"])->name('usuarios.single');

Route::delete('user/delete/{id}', [UserController::class, "deleteUser"])->name('usuarios.delete');

Route::post('user/login', [UserController::class, 'loginUser'])->name('usuarios.login');
Route::post('user/register', [UserController::class, 'registerUser'])->name('usuarios.register');

//*RESTAURANTS
Route::get('userRestaurants/all', [userRestaurantsController::class, "getAllRestaurants"])->name('restaurants.all');
Route::get('userRestaurants/single/{id}', [userRestaurantsController::class, "getSingleRestaurants"])->name('restaurants.single');

Route::post('userRestaurants/insert', [userRestaurantsController::class, "insertRestaurants"])->name('restaurants.insert');

//*FOOD
Route::get('foods/all', [FoodController::class, "getAllFood"])->name('food.all');
Route::get('foods/food', [FoodController::class, "getRestaurantFood"])->name('food.foods');

Route::post('foods/insert', [FoodController::class, "insertFood"])->name('food.insert');


//* CATEGORY
Route::get('categories/all', [CategoryController::class, "getAllCategory"])->name('category.all');
Route::get('categories/single/{id}', [CategoryController::class, "getSingleCategory"])->name('category.single');

Route::post('categories/insert', [CategoryController::class, 'insertCategory'])->name('category.insert');

Route::put('categories/update/{id}', [CategoryController::class, 'updateCategory'])->name('category.update');

Route::delete('categories/delete/{id}', [CategoryController::class, "deleteCategory"])->name('category.delete');


//*PROFILES
Route::get('profiles/all', [ProfileController::class, "getAllProfiles"])->name('profile.all');
Route::get('profiles/single/{id}', [ProfileController::class, "getSingleProfiles"])->name('profile.single');

Route::post('profiles/insert', [ProfileController::class, 'insertProfiles'])->name('profile.insert');

Route::put('profiles/update/{id}', [ProfileController::class, 'updateProfiles'])->name('profile.update');

Route::delete('profiles/delete/{id}', [ProfileController::class, "deleteProfiles"])->name('profile.delete');


//*COUNTRYS
Route::get('countries/all', [CountryController::class, "getAllCountry"])->name('pais.all');
Route::get('countries/single/{id}', [CountryController::class, "getSingleCountry"])->name('pais.single');

Route::post('countries/insert', [CountryController::class, 'insertCountry'])->name('pais.insert');

Route::put('countries/update/{id}', [CountryController::class, 'updateCountry'])->name('pais.update');

Route::delete('countries/delete/{id}', [CountryController::class, "deleteCountry"])->name('pais.delete');

//*STATES
Route::get('states/all', [StateController::class, "getAllState"])->name('states.all');
Route::get('states/single/{id}', [StateController::class, "getSingleState"])->name('states.single');

Route::post('states/insert', [StateController::class, 'insertState'])->name('states.insert');

Route::put('states/update/{id}', [StateController::class, 'updateState'])->name('states.update');

Route::delete('states/delete/{id}', [StateController::class, "deleteState"])->name('states.delete');
*/