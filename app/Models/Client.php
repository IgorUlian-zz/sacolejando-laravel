<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Client extends Authenticatable
{
    use HasFactory;
    use HasApiTokens;

    protected $table = 'clients';
    protected $primaryKey = 'id';
    protected $fillable = [
        'client_name',
        'client_email',
        'email_verified_at',
        'password',
        'contact',

    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}   

