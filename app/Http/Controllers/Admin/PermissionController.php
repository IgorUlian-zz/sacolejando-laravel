<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePermission;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    private $repository;

    public function __construct(Permission $permission)
    {
        $this->repository = $permission;

        
        $this->middleware('can:permissions');
    }

    public function index()
    {
        $permissions = $this->repository->latest()->paginate();

        return view('admin.pages.permissions.index', ['permissions' => $permissions]);
    }

    public function create()
    {
        return view('admin.pages.permissions.create');
    }

    public function store(StoreUpdatePermission $request)
    {

        $this->repository->create($request->all());


        return redirect()->route('permissions.index');
    }
    
    public function details($id)
    {
        $permission = $this->repository->where('id', $id)->first();

        if(!$permission)
            return redirect()->back();

        return view('admin.pages.permissions.details', ['permission' => $permission]);
    }

    public function delete($id)
    {

        $permission = $this->repository->where('id', $id)->first();

        if(!$permission)
            return redirect()->back();

        $permission->delete();

        return redirect()->route('permissions.index');
    }

    
    public function edit($id)
    {

        $permission = $this->repository->where('id', $id)->first();

        if(!$permission)
            return redirect()->back();

        return view('admin.pages.permissions.edit', ['permission' => $permission]);
    }

    public function update(StoreUpdatePermission $request, $id)
    {

        $permission = $this->repository->where('id', $id)->first();

        if(!$permission)
            return redirect()->back();

        $permission->update($request->all());

            return redirect()->route('permissions.index');
    }

    
    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $permissions = $this->repository
                        ->where(function($query) use ($request) {
                            if($request->filter){
                                $query->where('permission_name', $request->filter);
                                $query->orWhere('permission_desc', 'LIKE', "%{$request->filter}%");
                            }
                        })
                        ->latest()
                        ->paginate();

                        return view('admin.pages.permissions.index', compact('permissions', 'filters'));          

    }

}

