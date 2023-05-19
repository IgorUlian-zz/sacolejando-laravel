<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodOrder;
use Illuminate\Http\Request;

class FoodOrderController extends Controller

{
    private $repository;

    public function __construct(FoodOrder $foodOrder)
    {
        $this->repository = $foodOrder;
    }

    public function index()
    {
        $foodOrders = $this->repository->latest()->paginate();

        return view('admin.pages.foodOrders.index', compact('foodOrders'));
    }

    public function details($id)
    {
        $foodOrder = $this->repository->where('id', $id)->first();

        if(!$foodOrder)
            return redirect()->back();

        return view('admin.pages.foodOrders.details', ['foodOrder' => $foodOrder]);
    }

    public function search()
    {
        
    }

}