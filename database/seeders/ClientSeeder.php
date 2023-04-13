<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = [
            'name'      => 'Masihullah Khairy',
            'email'     => 'masihullah@gmail.com',
            'password'  => Hash::make('khairy'),
            'client_number' => 1,
            'business_name' => 'Some BS Name'
        ];

        Client::create($client);
    }
}
