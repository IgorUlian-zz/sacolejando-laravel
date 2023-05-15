<?php

namespace App\Repositories;

use App\Repositories\Contracts\FoodRepositoryInterface;
use Illuminate\Support\Facades\DB;

class FoodRepository implements FoodRepositoryInterface
{
    protected $table;

    public function __construct()
    {
        $this->table = 'foods';
    }

    public function getFoodByTenantId(int $idTenant, array $categories)
    {
        return DB::table($this->table)
                    ->join('category_food', 'category_food.food_id', '=', 'foods.id')
                    ->join('categories', 'category_food.category_id', '=', 'categories.id')
                    ->where('foods.tenant_id', $idTenant)
                    ->where('categories.tenant_id', $idTenant)
                    ->where(function ($query) use ($categories) {
                        if ($categories != [])
                            $query->whereIn('categories.uuid', $categories);
                    })
                    ->select('foods.*')
                    ->get();
    }

    public function getFoodByUuid(string $uuid)
    {
        return DB::table($this->table)
                    ->where('uuid', $uuid)
                    ->get();
    }
}