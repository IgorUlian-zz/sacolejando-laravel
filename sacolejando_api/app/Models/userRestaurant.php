<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userRestaurant extends Model
{
    protected $table = 'user_restaurants';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'profile_id',
        'restaurants_cnpj',
        'restaurant_name',
        'restaurant_contact',
    ];

    public function users() {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function profiles() {
        return $this->hasOne(Profile::class, 'profile_id', 'id');
    }

    public function foods() {
        return $this->hasMany(Food::class, 'restaurant_id', 'id');
    }

}
