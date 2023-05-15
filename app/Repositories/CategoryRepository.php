<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $table;

    public function __construct(Category $category)
    {
         $this->table = 'categories';
    }

    //INNER JOIN PARA RETORNAR A CATEGORIAS DO RESTAURANTE POR UUID
    public function getCategoriesByTenantUuid(string $uuid)
    {
        return DB::table($this->table)
                    ->join('tenants', 'tenants.id', '=', 'categories.tenant_id')
                    ->where('tenants.uuid', $uuid)
                    ->select('categories.*')
                    ->get();

    }

    //RETORNAR CATEGORIAS PELO ID DO RESTARUANTE
    public function getCategoriesByTenantId(int $idTenant)
    {
        return DB::table($this->table)
                    ->where('tenant_id', $idTenant)
                    ->get();
    }

    //RETORNAR CATEGORIAS PELO UUID
    public function getCategoryByUuid(string $uuid)
    {
        return DB::table($this->table)
                    ->where('uuid', $uuid)
                    ->first();
    }
}