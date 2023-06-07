<?php

namespace App\Models;

use App\Observers\PlanObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    protected $table = 'tenants';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tenant_cnpj',
        'url',
        'tenant_name',
        'tenant_email',
        'contact',
        'active',
        'subscription',
        'expires_at',
        'subscription_id',
        'subscription_active',
        'subscription_suspended',

    ];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function categories() {
        return $this->hasMany(Category::class);
    }
    
    public function foods() {
        return $this->hasMany(Food::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
    
    /*public function plans() {
        return $this->belongsTo(Plan::class);
    }*/
    
}