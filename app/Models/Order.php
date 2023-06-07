<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use TenantTrait;
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tenant_id',
        'identify',
        'client_id',
        'order_status',
        'total',
        'adress',
        'payment',
        'comments',
    ];

    public $statusOptions = [
        'Aprovado', 'Cancelado', 'Aguardando', 'Produzindo', 'Rota de Entrega', 'Finalizado'
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function evaluations()
    { 
        return $this->belongsTo(Evaluation::class);
    }
    
    public function foods()
    { 
        return $this->belongsToMany(Food::class);
    }

}
