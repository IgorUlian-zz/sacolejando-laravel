<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stPayment extends Model
{
    use HasFactory;
    protected $table = 'st_payments';
    protected $primaryKey = 'id';
    protected $fillable = [
        'st_payment_name',
        'st_payment_desc',
    ];
}
