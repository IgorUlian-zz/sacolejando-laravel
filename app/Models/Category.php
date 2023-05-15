<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use TenantTrait;
    
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'url',
        'category_name',
        'category_desc',

    ];

    public function foods()
    {
        return $this->belongsToMany(Food::class);
    }

    public function tenants() {
        return $this->belongsTo(Tenant::class, 'tenant_id', 'id');
    }
}