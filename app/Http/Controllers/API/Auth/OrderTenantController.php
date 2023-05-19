<?php

namespace App\Http\Controllers\API;

use App\Events\OrderCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\TenantRequestForm;
use App\Http\Requests\StoreUpdateOrder;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderAPIController extends Controller
{

    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(Request $request)
    {
        $tenant = Auth::guard('web')->user()->tenant;

        $date = $request->date ?? date('Y-m-d');
        $status = $request->status ?? 'all';
        $orders = $this->orderService->getOrdersByTenantId($tenant->id, $status, $date);

        return OrderResource::collection($orders);
    }

    public function update(Request $request)
    {
        $order = $this->orderService->updateStatusOrder($request->identify, $request->status);

        return new OrderResource($order);
    }
}