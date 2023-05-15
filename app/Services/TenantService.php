<?php

namespace App\Services;
use App\Models\Plan;
use App\Repositories\Contracts\TenantRepositoryInterface;

class TenantService
{
    private $plan, $data = [];
    private $repository;

    public function __construct(TenantRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAlltenants(int $per_page)
    {
        return $this->repository->getAllTenants($per_page);
    }

    public function getTenantsByUuid(string $uuid)
    {
        return $this->repository->getTenantsByUuid($uuid);
    }

    public function make(Plan $plan, array $data)
    {
        $this->plan = $plan;
        $this->data = $data;
        
        $tenant = $this->storeTenant();

        $user = $this->storeUser($tenant);
        
        return $user;
    }

    public function storeTenant()
    {
        $data = $this->data;

        return $this->plan->tenants()->create([
            'tenant_cnpj' => $data['cnpj'],
            'tenant_name' => $data['company'],
            'tenant_email' => $data['email'],

            'subscription' => now(),
            'expires_at' => now()->addDays(7),
        ]);
    }

    public function storeUser($tenant)
    {
        $user = $tenant->users()->create([
            'name' => $this->data['username'],
            'email' => $this->data['email'],
            'password' => bcrypt($this->data['password']),
        ]);

        return $user;
    }
}