<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\FoodOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\StoreUpdateOrderFood;


class OrderController extends Controller
{
    private $foodRepository;
    private $repository;


    public function __construct(Order $order, FoodOrder $foodOrder)
    {
        $this->repository = $order;
        $this->foodRepository = $foodOrder;

    }

    public function create()
    {
        return view('admin.pages.orders.create');
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

                        return view('admin.pages.orders.index', compact('orders', 'filters'));          
    }
    public function details($id)
    {
       /*$order = Order::select(
            "orders.id",
            "orders.identify",
            "orders.tenant_id",
            "orders.client_id",
            "orders.order_status",  
            "orders.total",
            "orders.order_comment",
            "orders.created_at",
            "food_order.quantity",
            "food_order.price"
        )
        ->join("food_order", "orders.id", "=", "food_order.order_id")
        ->first();*/
        $order = $this->repository->where('id', $id)->first();


        if(!$order)
            return redirect()->back();

        return view('admin.pages.orders.details', ['order' => $order]);
    }

    public function foodDetails($identify)
    {   


        $orders = FoodOrder::select(
            "food_order.order_id",
            "food_order.food_id",
            "food_order.quantity",
            "food_order.price",
            "orders.identify",
            "orders.id",

        )
        ->join("orders", "orders.id", "=", "food_order.order_id")
        ->where("identify", $identify)
        ->get();
        

        if(!$orders){
            return redirect()->back();
        }

        return view('admin.pages.orders.foodDetails', ['orders' => $orders]);

    }

    public function edit($id)
    {

        $order = $this->repository->where('id', $id)->first();

        if(!$order)
            return redirect()->back();

        return view('admin.pages.orders.edit', ['order' => $order]);
    }

    public function update(StoreUpdateOrderFood $request, $id)
    {

        $order = $this->repository->where('id', $id)->first();

        if(!$order)
            return redirect()->back();

        $order->update($request->all());

            return redirect()->route('orders.index');
    }

    public function store(StoreUpdateOrderFood $request)
    {

        $this->repository->create($request->all());


        return redirect()->route('orders.index');
    }
    
}
