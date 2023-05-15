<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use TenantTrait;

    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tenant_id',
        'identify',
        'client_id',
        'order_status',
        'order_price',
        'order_comment',
    ];

    public function tenants()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function clients()
    {
        return $this->belongsTo(Client::class);
    }

    public function foods()
    {
        return $this->belongsToMany(Food::class);
    }
}
