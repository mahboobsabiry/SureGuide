<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Business;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $business = [
            'name'  => 'Business Name',
            'type'  => 'Trade',
            'desc'  => 'Some text to describe this business'
        ];

        Business::create($business);
    }
}
