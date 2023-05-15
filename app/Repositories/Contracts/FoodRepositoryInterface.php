<?php

namespace App\Repositories\Contracts;

interface FoodRepositoryInterface
{
    public function getFoodByTenantId(int $idTenant, array $categories);
    public function getFoodByUuid(string $uuid);

}