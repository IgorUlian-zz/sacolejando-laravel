<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfile;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $repository;

    public function __construct(Profile $profile)
    {
        $this->repository = $profile;

        
        $this->middleware('can:profiles');
    }

    public function index()
    {
        $profiles = $this->repository->latest()->paginate();

        return view('admin.pages.profiles.index', ['profiles' => $profiles]);
    }

    public function create()
    {
        return view('admin.pages.profiles.create');
    }

    public function store(StoreUpdateProfile $request)
    {

        $this->repository->create($request->all());


        return redirect()->route('profiles.index');
    }
    
    public function details($url)
    {
        $profile = $this->repository->where('url', $url)->first();

        if(!$profile)
            return redirect()->back();

        return view('admin.pages.profiles.details', ['profile' => $profile]);
    }

    public function delete($url)
    {

        $profile = $this->repository->where('url', $url)->first();

        if(!$profile)
            return redirect()->back();

        $profile->delete();

        return redirect()->route('profiles.index');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $profiles = $this->repository
                        ->where(function($query) use ($request) {
                            if($request->filter){
                                $query->where('profile_name', $request->filter);
                                $query->orWhere('profile_desc', 'LIKE', "%{$request->filter}%");
                            }
                        })
                        ->paginate();

                        return view('admin.pages.profiles.index', compact('profiles', 'filters'));          

    }
    
    public function edit($url)
    {

        $profile = $this->repository->where('url', $url)->first();

        if(!$profile)
            return redirect()->back();

        return view('admin.pages.profiles.edit', ['profile' => $profile]);
    }

    public function update(StoreUpdateProfile $request, $url)
    {

        $profile = $this->repository->where('url', $url)->first();

        if(!$profile)
            return redirect()->back();

        $profile->update($request->all());

            return redirect()->route('profiles.index');
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
