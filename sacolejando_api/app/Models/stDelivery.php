<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stDelivery extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'st_deliveries';
    protected $primaryKey = 'id';
    protected $fillable = [
        'st_delivery_name',
        'st_delivery_desc',
    ];
}
