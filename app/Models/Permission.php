<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'permission_name',
        'permission_desc',
    ];

    /**
     * get profiles
     */
    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

        /**
     * get roles
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
