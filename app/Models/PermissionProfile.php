<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionProfile extends Model
{
    use HasFactory;
    protected $table = 'permission_profiles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'profile_id',
        'permission_id',
    ];
}
