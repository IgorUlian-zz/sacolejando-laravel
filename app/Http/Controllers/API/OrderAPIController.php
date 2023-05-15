<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
}
