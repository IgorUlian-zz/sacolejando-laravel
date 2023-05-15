<?php

namespace App\Repositories\Contracts;

interface TenantRepositoryInterface
{

    //RECUPERAR TODOS OS TENANTS
    public function getAllTenants(int $per_page);

    //RECUPERAR TODOS OS TENANTS POR UUID
    public function getTenantsByUuid(string $uuid);
}