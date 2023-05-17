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
            'client_email' => 'beatrizcg@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
