<?php

use App\Http\Controllers\ProfileController;
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
    ->group(function(){
    
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

    //plans
    Route::put('plans/{url}', [PlanController::class, 'update'])->name('plans.update');
    Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
    Route::post('plans/store', [PlanController::class, 'store'])->name('plans.store');
    Route::delete('plans/{url}', [PlanController::class, 'delete'])->name('plans.delete');

    Route::get('/', [PlanController::class, 'index'])->name('plans.admin');
    Route::get('plans/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::get('plans/index', [PlanController::class, 'index'])->name('plans.index');
    Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::get('plans/{url}', [PlanController::class, 'details'])->name('plans.details');
    
});


Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
