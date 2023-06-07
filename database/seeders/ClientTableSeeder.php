<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            'client_name'=> 'Beatriz Carmelin',
            'client_email' => 'beatriz@gmail.com',
            'password' => bcrypt('123456'),
            'contact' => '18996884415'
        ]);
        Client::create([
            'client_name'=> 'Kauane Ulian',
            'client_email' => 'kauane@gmail.com',
            'password' => bcrypt('123456'),
            'contact' => '18998236045'
        ]);
        Client::create([
            'client_name'=> 'Igor Ulian',
            'client_email' => 'igor@gmail.com',
            'password' => bcrypt('123456'),
            'contact' => '18998146078'
        ]);
        Client::create([
            'client_name'=> 'Osmair Ulian',
            'client_email' => 'osmair@gmail.com',
            'password' => bcrypt('123456'),
            'contact' => '18997890968'
        ]);
        Client::create([
            'client_name'=> 'Magda Freitas',
            'client_email' => 'magda@gmail.com',
            'password' => bcrypt('123456'),
            'contact' => '998021917'
        ]);
    }
}
