<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTenant;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TenantController extends Controller
{
    private $repository;

    public function __construct(Tenant $tenant)
    {
        $this->repository = $tenant;

        
        $this->middleware('can:tenants');
    }
    
    /**
     * METODO DE VISUALIZAÇÃO
     */
    public function index()
    {
        $tenants = $this->repository->latest()->paginate();

        return view('admin.pages.tenants.index', compact('tenants'));
    }

    /**
     * METODO PARA CADASTRAR UM NOVO
     */
    public function create()
    {
        return view('admin.pages.tenants.create');
    }

    public function store(StoreUpdateTenant $request)
    {

        $this->repository->create($request->all());


        return redirect()->route('tenants.index');
    }

    /**
     * OBTER RESULTADOS
     */
    public function details($id)
    {

        if(!$tenant = $this->repository->with('plan')->find($id))
        {
            return redirect()->back();

        }

        return view('admin.pages.tenants.details', compact('tenant'));
    }

    /**
     * FUNÇÃO PARA APAGAR
     */

    public function delete($id)
    {
        if(!$tenant = $this->repository->find($id)){
            return redirect()->back();
        }

        $tenant->delete();

        return redirect()->route('tenants.index');
    }

    /**
     * ATUALIZAR RESULTADOS
     */

    public function edit($id)
    {

        if(!$tenant = $this->repository->find($id)){
            return redirect()->back();
        }

        return view('admin.pages.tenants.edit', compact('tenant'));
    }

    /**
     * ATUALIZAR RESULTADOS
     */

    public function update(StoreUpdateTenant $request, $id)
    {

        if(!$tenant = $this->repository->find($id)){
            return redirect()->back();

        }

        $tenant->update($request->all());

            return redirect()->route('tenants.index');
    }

    /**
     * PESQUISAR RESULTADOS
     */

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $tenants = $this->repository
                        ->where(function($query) use ($request) {
                            if($request->filter){
                                $query->where('tenant_name', 'LIKE', "%{$request->filter}%");
                            }
                        })
                        ->latest()
                        ->paginate();

                        return view('admin.pages.tenants.index', compact('tenants', 'filters'));          

    }

}

