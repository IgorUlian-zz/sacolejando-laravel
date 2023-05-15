<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use TenantTrait;

    use HasFactory;
    protected $table = 'foods';
    protected $primaryKey = 'id';
    protected $fillable = [
        'food_name',
        'food_price',
        'food_desc',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tenants() {
        return $this->belongsTo(Tenant::class, 'tenant_id', 'id');
    }

    /**
     * category not linked with this product
     */
    public function categoriesAvailable($filter = null)
    {
        $categories = Category::whereNotIn('categories.id', function($query) {
            $query->select('category_food.category_id');
            $query->from('category_food');
            $query->whereRaw("category_food.food_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter) {
            if ($filter)
                $queryFilter->where('categories.category_name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $categories;
    }
}