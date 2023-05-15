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
        return $this->belongsToMany(Profile::class);
    }

    /**
     * search plans
     */
    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate();

        return $results;
    }

    
      /**
     * profiles not linked with this plan
     */
    public function profilesAvailable($filter = null)
    {
        $profiles = Profile::whereNotIn('profiles.id', function($query) {
            $query->select('plan_profile.profile_id');
            $query->from('plan_profile');
            $query->whereRaw("plan_profile.plan_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter) {
            if ($filter)
                $queryFilter->where('profiles.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $profiles;
    }
}
