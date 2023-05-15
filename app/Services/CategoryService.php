<?php

namespace App\Services;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class CategoryService
{
    protected $tenantRepository;
    protected $categoryService;

    public function __construct(TenantRepositoryInterface $tenantRepository, CategoryRepositoryInterface $categoryService)
    {
        $this->categoryService = $categoryService;
        $this->tenantRepository = $tenantRepository;
    }

    //RETORNAR CATEGORIAS PELO UUID
    public function getCategoriesByUuid(string $uuid)
    {
        $tenant = $this->tenantRepository->getTenantsByUuid($uuid);

        return $this->categoryService->getCategoriesByTenantId($tenant->id);
    }

    //RETORNAR UNICA CATEGORIA PELA UUID
    public function getCategoryByUuid(string $uuid)
    {
        return $this->categoryService->getCategoryByUuid($uuid);
    }
    

}