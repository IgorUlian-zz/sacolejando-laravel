<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\TenantRequestForm;
use App\Http\Resources\FoodResource;
use App\Services\FoodService;
use Illuminate\Http\Request;

class FoodAPIController extends Controller
{
    protected $foodService;
    //
    public function __construct(FoodService $foodService)
    {
        $this->foodService = $foodService;
    }

    public function foodsByTenant(TenantRequestForm $request)
    {
        $foods = $this->foodService->getFoodByTenantUuid($request->token_company, $request->get('categories', []));

        return FoodResource::collection($foods);
    }

    public function showFoods(TenantRequestForm $request, $identify)
    {
        if (!$food = $this->foodService->getFoodByUuid($identify)) {
            return response()->json(['message' => 'Comida não encontrada'], 404);
        }

        return new FoodResource($food);
    }
}
