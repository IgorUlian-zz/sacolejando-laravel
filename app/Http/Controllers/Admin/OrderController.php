<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $repository;

    public function __construct(Order $order)
    {
        $this->repository = $order;
    }

    public function index()
    {
        $orders = $this->repository->latest()->paginate();

        return view('admin.pages.orders.index', compact('orders'));
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $orders = $this->repository
                        ->where(function($query) use ($request) {
                            if($request->filter){
                                $query->where('identify', $request->filter);
                                $query->orWhere('order_status', 'LIKE', "%{$request->filter}%");
                            }
                        })
                        ->latest()
                        ->paginate();

                        return view('admin.pages.foodOrders.index', compact('orders', 'filters'));          

    }
    public function details($identify)
    {
        $order = $this->repository->where('identify', $identify)->first();

        if(!$order)
            return redirect()->back();

        return view('admin.pages.orders.details', ['order' => $order]);
    }

}