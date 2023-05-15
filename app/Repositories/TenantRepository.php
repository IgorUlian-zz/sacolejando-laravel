<?php

namespace App\Repositories;

use App\Models\Tenant;
use App\Repositories\Contracts\TenantRepositoryInterface;

class TenantRepository implements TenantRepositoryInterface
{

    protected $entity;

    //INJETAR MODEL TENANT PARA CRIAR UMA ENTIDADE
    public function __construct(Tenant $tenant)
    {
        $this->entity = $tenant;
    }

    //RETORNAR TODOS OS TENANTS
    public function getAlltenants($per_page)
    {
        return $this->entity->paginate($per_page);
    }

    //RETORNAR TODOS OS TENANTS POR UUID
    public function getTenantsByUuid(string $uuid)
    {
    return $this->entity
            ->where('uuid', $uuid)
            ->first();
    }
}