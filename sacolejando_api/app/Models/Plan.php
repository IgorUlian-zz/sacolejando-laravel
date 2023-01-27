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
        'plan_price',
        'plan_desc',
        'url',

    ];

    public function search($filter = null)
    {
        $results = $this
            ->where('plan_name', 'LIKE', "%{$filter}%")
            ->orWhere('plan_desc', 'LIKE', "%{$filter}%")
            ->paginate();

            return $results;
    }
}
