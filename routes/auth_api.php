<?php

use Illuminate\Routing\Route;

Route::group([
    'prefix' => 'v1',
    'namespace' => 'api'

], function () {
    Route::get('/my-orders', [OrderTenantController::class, 'index'])->middleware(['auth']);
    Route::patch('/my-orders', [OrderTenantController::class, 'update'])->middleware(['auth']);

});