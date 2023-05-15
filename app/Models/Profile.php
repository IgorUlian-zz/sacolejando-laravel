<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'profile_name',
        'profile_desc',
        'url',
    ];

    /**
     * get permissions
     */

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * get plans
     */
    public function plans()
    {
        return $this->belongsToMany(Plan::class);
    }
    

      /**
     * Permission not linked with this profile
     */
    public function permissionsAvailable($filter = null)
    {
        $permissions = Permission::whereNotIn('permissions.id', function($query) {
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter) {
            if ($filter)
                $queryFilter->where('permissions.permission_name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $permissions;
    }
}