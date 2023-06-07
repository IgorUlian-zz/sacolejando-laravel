<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant1 = Tenant::find(1);

        $tenant2 = Tenant::find(2);
        
        $tenant3 = Tenant::find(3);
        
        $tenant4 = Tenant::find(4);

        $tenant5 = Tenant::find(5);


        $tenant1->users()->create([
            'name' => 'Igor Ulian',
            'email' => 'i97ulian@gmail.com',
            'password' => bcrypt('123456'),
            'contact' => '18998146078',

        ]);

        $tenant2->users()->create([
            'name' => 'Beatriz Carmelin',
            'email' => 'beatrizcarmelin@gmail.com',
            'password' => bcrypt('123456'),
            'contact' => '18996884415',
        ]);

        $tenant3->users()->create([
            'name' => 'Kauane Ulian',
            'email' => 'kauaneulian@gmail.com',
            'password' => bcrypt('123456'),
            'contact' => '18996884415',

        ]);

        $tenant4->users()->create([
            'name' => 'Magda Freitas',
            'email' => 'magdafreitas@gmail.com',
            'password' => bcrypt('123456'),
            'contact' => '18996884415',

        ]);

        $tenant5->users()->create([
            'name' => 'Osmair Ulian',
            'email' => 'osmairulian@gmail.com',
            'password' => bcrypt('123456'),
           'contact' => '18996884415',

        ]);

    }
}
