<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodOrder extends Model
{
    use HasFactory;
    protected $table = 'food_order';
    protected $primaryKey = 'id';
    protected $fillable = [
        'food_id',
        'order_id',
        'quantity',
        'price'

    ];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}