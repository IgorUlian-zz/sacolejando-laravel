<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $repository;

    public function __construct(User $user)
    {
        $this->repository = $user;

        
        $this->middleware('can:users');
    }

    public function index()
    {
        $users = $this->repository->latest()->tenantUser()->paginate();

        return view('admin.pages.users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('admin.pages.users.create');
    }

    public function store(StoreUpdateUser $request)
    {
        $data = $request->all();
        $data['tenant_id'] = auth()->user()->tenant_id;
        $data['password'] = bcrypt($data['password']);


        $this->repository->create($data);

        return redirect()->route('users.index');
    }
    
    public function details($id)
    {

        if(!$user = $this->repository->tenantUser()->find($id));
            return redirect()->back();

        return view('admin.pages.users.details', ['user' => $user]);
    }

    public function delete($id)
    {
        if(!$user = $this->repository->tenantUser()->find($id)){
            return redirect()->back();
        }

        $user->delete();

        return redirect()->route('users.index');
    }

    public function edit($id)
    {

        if(!$user = $this->repository->tenantUser()->find($id)){
            return redirect()->back();
        }

        return view('admin.pages.users.edit', ['user' => $user]);
    }

    public function update(StoreUpdateUser $request, $id)
    {

        if(!$user = $this->repository->tenantUser()->find($id)){
            return redirect()->back();

        }

        $data = $request->only(['name', 'email']);

        if($request->password){
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

            return redirect()->route('users.index');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $users = $this->repository
                        ->where(function($query) use ($request) {
                            if($request->filter){
                                $query->where('name', $request->filter);
                                $query->orWhere('email', 'LIKE', "%{$request->filter}%");
                            }
                        })
                        ->latest()
                        ->tenantUser()
                        ->paginate();

                        return view('admin.pages.users.index', compact('users', 'filters'));          

    }
    

}
