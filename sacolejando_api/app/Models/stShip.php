<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stShip extends Model
{
    use HasFactory;
    protected $table = 'st_ships';
    protected $primaryKey = 'id';
    protected $fillable = [
        'st_ship_name',
        'st_ship_desc',
    ];
}
