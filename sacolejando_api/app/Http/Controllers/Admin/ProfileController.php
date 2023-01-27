<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfile;
use App\Models\Profile;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ProfileController extends Controller
{
    private $repository;

    public function __construct(Profile $profiles)
    {
        $this->repository = $profiles;
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
        $profiles = $this->repository->where('url', $url)->first();

        if(!$profiles)
            return redirect()->back();

        return view('admin.pages.profiles.details', ['profiles' => $profiles]);
    }

    public function delete($url)
    {

        $profiles = $this->repository->where('url', $url)->first();

        if(!$profiles)
            return redirect()->back();

        $profiles->delete();

        return redirect()->route('profiles.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $profiles = $this->repository->search($request->filter);

        return view('admin.pages.profiles.index',
        ['profiles' => $profiles,
         'filters' => $filters]);

    }

    
    public function edit($url)
    {

        $profiles = $this->repository->where('url', $url)->first();

        if(!$profiles)
            return redirect()->back();

        return view('admin.pages.profiles.edit', ['profiles' => $profiles]);
    }

    public function update(StoreUpdateProfile $request, $url)
    {

        $profiles = $this->repository->where('url', $url)->first();

        if(!$profiles)
            return redirect()->back();

        $profiles->update($request->all());

            return redirect()->route('profiles.index');
    }

}
