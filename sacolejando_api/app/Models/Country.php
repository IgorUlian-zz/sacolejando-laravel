<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class Country extends Model
{
    use HasFactory;
    protected $table = 'countries';
    protected $primaryKey = 'id';
    protected $fillable = [
        'country_cipher',
        'country_name',
    ];

    public function states(){
        return $this->hasMany(State::class, 'country_id', 'id');
    }
}
