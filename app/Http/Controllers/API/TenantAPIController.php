<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TenantResource;
use App\Services\TenantService;
use Illuminate\Http\Request;

class TenantAPIController extends Controller
{
    protected $tenantService;

    public  function __construct(TenantService $tenantService)
    {
        $this->tenantService = $tenantService;
    }

    //RETORNAR TODOS TENANTS USANDO RESOURCE
    public function indexTenants(Request $request)
    {
        $per_page = (int) $request->get('per_page', 15);

        $tenants = $this->tenantService->getAlltenants($per_page);

        return TenantResource::collection($tenants);
    }

    //RETORNAR TODOS TENANTS USANDO UUID
    public function showTenants($uuid)
    {
        if(!$tenant = $this->tenantService->getTenantsByUuid($uuid)){
            return response()->json(['message' => 'Não encontrado'], 404);
        }

        return new TenantResource($tenant);
    }
}
