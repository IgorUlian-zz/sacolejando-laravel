<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $table = 'plans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'plan_name',
        'url',
        'plan_price',
        'plan_desc',

    ];

    /**
     * get tenants
     */

    public function tenants() {
        return $this->hasMany(Tenant::class);
    }

    /**
     * get perfis
     */
    public function profiles() {
        return $this->belongsTo(Profile::class);
    }

    
      /**
     * profiles not linked with this plan
     */
    public function permissionsAvailable($filter = null)
    {
        $profiles = Profile::whereNotIn('profiles.id', function($query) {
            $query->select('plan_profile.profile_id');
            $query->from('plan_profile');
            $query->whereRaw("profile_id.plan_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter) {
            if ($filter)
                $queryFilter->where('profiles.plan_name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $profiles;
    }
}

