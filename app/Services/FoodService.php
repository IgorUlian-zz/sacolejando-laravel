<?php

namespace App\Services;

use App\Repositories\Contracts\FoodRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class FoodService
{
    protected $tenantRepository;
    protected $foodRepository;

    public function __construct(TenantRepositoryInterface $tenantRepository, FoodRepositoryInterface $foodRepository)
    {
        $this->foodRepository = $foodRepository;
        $this->tenantRepository = $tenantRepository;
    }

    public function getFoodByTenantUuid(string $uuid, array $categories)
    {
        $tenant = $this->tenantRepository->getTenantsByUuid($uuid);

        return $this->foodRepository->getFoodByTenantId($tenant->id, $categories);
    }

    public function getFoodByUuid(string $uuid)
    {
        return $this->foodRepository->getFoodByUuid($uuid);
    }
}