<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\TenantRequestForm;
use App\Http\Requests\StoreUpdateOrder;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderAPIController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function storeOrder(StoreUpdateOrder $request)
    {
        $order = $this->orderService->createNewOrder($request->all());

        return new OrderResource($order);
    }
    
    public function showOrders($identify)
    {
        if(!$order = $this->orderService->getOrderByIdentify($identify)) {
            return response()->json(['message' => 'Não Encontrado'], 404);
        }

        return new OrderResource($order);
    }

    public function myOrders()
    {
        $orders = $this->orderService->ordersByClient();

        return OrderResource::collection($orders);
    }
}
