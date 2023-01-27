<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stOrdered extends Model
{
    use HasFactory;
    protected $table = 'st_ordereds';
    protected $primaryKey = 'id';
    protected $fillable = [
        'st_ordered_name',
        'st_ordered_desc',
    ];
}