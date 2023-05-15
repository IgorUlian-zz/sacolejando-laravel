<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tenant = Tenant::first();

        $tenant->categories()->create([   
            'category_name' => 'Salada',
            'category_desc' => 'Mistura de legumes, vegetais e até mesmo Frutas.',
        ]);
    }
}