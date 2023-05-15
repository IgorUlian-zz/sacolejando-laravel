<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;

        
        $this->middleware('can:plans');
    }

    public function index()
    {
        $plans = $this->repository->latest()->paginate();

        return view('admin.pages.plans.index', ['plans' => $plans]);
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store(StoreUpdatePlan $request)
    {

        $this->repository->create($request->all());


        return redirect()->route('plans.index');
    }

    public function details($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if(!$plan)
            return redirect()->back();

        return view('admin.pages.plans.details', ['plan' => $plan]);
    }

    public function delete($url)
    {

        $plan = $this->repository->where('url', $url)->first();

        if(!$plan)
            return redirect()->back();

        $plan->delete();

        return redirect()->route('plans.index');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $users = $this->repository
                        ->where(function($query) use ($request) {
                            if($request->filter){
                                $query->where('plan_name', $request->filter);
                                $query->orWhere('plan_desc', 'LIKE', "%{$request->filter}%");
                            }
                        })
                        ->paginate();

                        return view('admin.pages.plans.index', compact('plans', 'filters'));          

    }

    public function edit($url)
    {

        $plan = $this->repository->where('url', $url)->first();

        if(!$plan)
            return redirect()->back();

        return view('admin.pages.plans.edit', ['plan' => $plan]);
    }

    public function update(StoreUpdatePlan $request, $url)
    {

        $plan = $this->repository->where('url', $url)->first();

        if(!$plan)
            return redirect()->back();

        $plan->update($request->all());

            return redirect()->route('plans.index');
    }
}
