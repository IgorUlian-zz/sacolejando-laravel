<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table = 'foods';
    protected $primaryKey = 'id';
    protected $fillable = [
        'category_id',
        'restaurant_id',
        'food_name',
        'food_price',
        'food_ingredients',
    ];

    public function restaurants() {
        return $this->belongsTo(userRestaurant::class, 'restaurant_id', 'id');
    }

    public function categories() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
