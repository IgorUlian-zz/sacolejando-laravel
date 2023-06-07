<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Traits\UserAdminTraits;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use UserAdminTraits;
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tenant_id',
        'name',
        'contact',
        'email',
        'email_verified_at',
        'password',

    ];

    
    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTenantUser(Builder $query)
    {
        return $query->where('tenant_id', auth()->user()->tenant_id);
    }

    /**
     * get tenants
     */
    public function tenants() {
        return $this->belongsTo(Tenant::class, 'tenant_id', 'id');
    }


    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * get roles
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

        /**
     * Roles not linked with this users
     */
    public function rolesAvailable($filter = null)
    {
        $roles = Role::whereNotIn('roles.id', function($query) {
            $query->select('role_user.role_id');
            $query->from('role_user');
            $query->whereRaw("role_user.user_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter) {
            if ($filter)
                $queryFilter->where('roles.role_name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $roles;
    }
}