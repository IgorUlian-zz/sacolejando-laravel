<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $plan = Plan::first();

        $plan->tenants()->create([   
            'tenant_cnpj' => '46142180800011',
            'tenant_name' => 'Sacolejando',
            'url' => 'sacolejando',
            'tenant_email' => 'i97ulian@gmail.com',

        ]);
    }
}
