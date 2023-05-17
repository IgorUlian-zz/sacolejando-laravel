<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFood extends Model
{
    use HasFactory;
    protected $table = 'order_food';
    protected $primaryKey = 'id';
    protected $fillable = [
        'food_id',
        'order_id',
    ];
}
