<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'profile_name'=> 'Free',
            'profile_desc' => 'Perfil direcionado a usuários Free',
            'url' => 'plano-free',
        ]);

        Profile::create([
            'profile_name'=> 'Standard',
            'profile_desc' => 'Perfil direcionado a usuários Standard',
            'url' => 'plano-standard',
        ]);

        Profile::create([
            'profile_name'=> 'Premium',
            'profile_desc' => 'Perfil direcionado a usuários Premium',
            'url' => 'plano-premium',
        ]);
    }
}
