<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Demand;
use App\Models\BusinessIndustry;

class DemandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $demands = [
            [
                'question'      => 'Do people need it right now?',
                'answer'        => implode(',', ['Yes', 'Possible', 'Sometimes', 'No']),
                'industry_id'   => 1
            ],
            [
                'question'      => 'Is the problem you \'re solving expensive for customers',
                'answer'        => implode(',', ['Yes', 'Possible', 'Sometimes', 'No']),
                'industry_id'   => 2
            ],
            [
                'question'      => 'Are customers willing to pay for this service?',
                'answer'        => implode(',', ['Yes', 'Possible', 'Sometimes', 'No']),
                'industry_id'   => 1
            ]
        ];

        foreach ($demands as $demand) {
            Demand::create($demand);
        }
    }
}
