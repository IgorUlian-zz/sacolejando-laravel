<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'plan_name'=> 'Free',
            'url' => 'free',
            'plan_price' => 0.0,
            'plan_desc' => 'Plano para teste de 5 dias.',
        ]);

        Plan::create([
            'plan_name'=> 'Standard',
            'url' => 'standard',
            'plan_price' => 89.90,
            'plan_desc' => 'Plano para usuários básicos do sistema.',
        ]);
    }
}
