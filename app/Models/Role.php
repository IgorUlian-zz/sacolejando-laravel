<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'role_name',
        'role_desc',
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
     * get users
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Permission not linked with this roles
     */
    public function permissionsAvailable($filter = null)
    {
        $permissions = Permission::whereNotIn('permissions.id', function($query) {
            $query->select('permission_role.permission_id');
            $query->from('permission_role');
            $query->whereRaw("permission_role.role_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter) {
            if ($filter)
                $queryFilter->where('permissions.permission_name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $permissions;
    }
}

