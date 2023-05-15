<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanProfile extends Model
{
    use HasFactory;
    protected $table = 'plan_profile';
    protected $primaryKey = 'id';
    protected $fillable = [
        'profile_id',
        'plan_id',
    ];
}
