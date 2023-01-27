<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'category_name',
        'category_desc',
    ];

    public function foods() {
        return $this->hasMany(Food::class, 'category_id', 'id');
    }
}
