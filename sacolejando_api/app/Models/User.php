<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_name',
        'user_email',
        'user_password',
    ];

    public function restaurants() {
        return $this->belongsTo(userRestaurant::class, 'user_id', 'id');
    }
}