<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryFood extends Model
{
    protected $table = 'permission_profiles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'category_id',
        'food_id',
    ];
}
