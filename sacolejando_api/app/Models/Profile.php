<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'profile_name',
        'profile_desc',
        'url',
    ];

    public function restaurants() {
        return $this->belongsTo(userRestaurant::class, 'profile_id', 'id');
    }

    //metodos
    public function search($filter = null)
    {
        $results = $this
            ->where('profile_name', 'LIKE', "%{$filter}%")
            ->orWhere('profile_desc', 'LIKE', "%{$filter}%")
            ->paginate();

            return $results;
    }
}
