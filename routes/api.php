<?php

use App\Http\Controllers\API\Auth\AuthClientController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\CategoryAPIController;
use App\Http\Controllers\API\EvaluationAPIController;
use App\Http\Controllers\API\FoodAPIController;
use App\Http\Controllers\API\OrderAPIController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\TenantAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/token', [AuthClientController::class, 'authClient']);

Route::group([
    'middleware' => ['auth:sanctum']], function () {
        Route::get('/auth/me', [AuthClientController::class, 'recoverMe']);
        Route::get('/auth/v1/my-orders', [OrderAPIController::class, 'myOrders']);

        Route::post('/auth/logout', [AuthClientController::class, 'logoutClient']);
        Route::post('/auth/v1/orders', [OrderAPIController::class, 'storeOrder']);
        Route::post('/auth/v1/orders/{identifyOrder}/evaluations', [EvaluationAPIController::class, 'storeEvaluation']);



    }
);

Route::group([
    'prefix' => 'v1',
    'namespace' => 'API'
],
    function () {
        
// ROTAS PARA RESTAURANTES
Route::get('/tenants', [TenantAPIController::class, 'indexTenants']);
Route::get('/tenants/{uuid}', [TenantAPIController::class, 'showTenants']);

//ROTAS PARA CATEGORIAS
Route::get('/categories/{identify}', [CategoryAPIController::class, 'showCategory']);
Route::get('/categories', [CategoryAPIController::class, 'categoriesByTenant']);

//ROTAS PARA PRODUTOS
Route::get('/foods/{identify}', [FoodAPIController::class, 'showFoods']);
Route::get('/foods', [FoodAPIController::class, 'foodsByTenant']);

//ROTAS PARA CLIENTS
Route::post('/clients', [RegisterController::class, 'storeClient']);

//ROTAS PARA PEDIDOS
Route::get('/orders/{identify}', [OrderAPIController::class, 'showOrders']);
Route::post('/orders', [OrderAPIController::class, 'storeOrder']);


    }
);
