<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateRole;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private $repository;

    public function __construct(Role $role)
    {
        $this->repository = $role;

        
        $this->middleware('can:roles');
    }

    public function index()
    {
        $roles = $this->repository->latest()->paginate();

        return view('admin.pages.roles.index', ['roles' => $roles]);
    }

    public function create()
    {
        return view('admin.pages.roles.create');
    }

    public function store(StoreUpdateRole $request)
    {

        $this->repository->create($request->all());


        return redirect()->route('roles.index');
    }
    public function details($url)
    {
        $role = $this->repository->where('url', $url)->first();

        if(!$role)
            return redirect()->back();

        return view('admin.pages.roles.details', ['role' => $role]);
    }

    public function delete($url)
    {

        $role = $this->repository->where('url', $url)->first();

        if(!$role)
            return redirect()->back();

        $role->delete();

        return redirect()->route('roles.index');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $users = $this->repository
                        ->where(function($query) use ($request) {
                            if($request->filter){
                                $query->where('role_name', $request->filter);
                                $query->orWhere('role_desc', 'LIKE', "%{$request->filter}%");
                            }
                        })
                        ->paginate();

                        return view('admin.pages.roles.index', compact('roles', 'filters'));          

    }
    
    public function edit($url)
    {

        $role = $this->repository->where('url', $url)->first();

        if(!$role)
            return redirect()->back();

        return view('admin.pages.roles.edit', ['role' => $role]);
    }

    public function update(StoreUpdateRole $request, $url)
    {

        $role = $this->repository->where('url', $url)->first();

        if(!$role)
            return redirect()->back();

        $role->update($request->all());

            return redirect()->route('roles.index');
    }

    
    /*public function search(Request $request)
    {
        $filters = $request->only('filter');

        $users = $this->repository
                        ->where(function($query) use ($request) {
                            if($request->filter){
                                $query->where('name', $request->filter);
                                $query->orWhere('description', 'LIKE', "%{$request->filter}%");
                            }
                        })
                        ->paginate();

                        return view('admin.pages.users.index', compact('users', 'filters'));          

    }*/

}

