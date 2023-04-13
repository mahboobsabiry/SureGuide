<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BusinessIndustry;
use App\Models\Business;

class BusinessIndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bsIndustries = [
            [
                'name'  => 'Retail',
                'desc'  => 'Some text 1',
                'business_id' => 1
            ],
            [
                'name'  => 'Construction',
                'desc'  => 'Some text 2',
                'business_id' => 1
            ],
            [
                'name'  => 'Services',
                'desc'  => 'Some text 3',
                'business_id' => 1
            ],
            [
                'name'  => 'Hospitality',
                'desc'  => 'Some text 4',
                'business_id' => 1
            ],
            [
                'name'  => 'Manufacturing',
                'desc'  => 'Some text 5',
                'business_id' => 1
            ],
        ];

        foreach ($bsIndustries as $bsi) {
            BusinessIndustry::create($bsi);
        }
    }
}
