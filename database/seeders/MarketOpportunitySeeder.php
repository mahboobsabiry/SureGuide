<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MarketOpportunity;
use App\Models\BusinessIndustry;

class MarketOpportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $market = [
            [
                'question'      => 'Do you offer this service/product directly consumers ?',
                'answer'        => implode(',', ['Yes', 'Possible', 'Sometimes', 'No']),
                'industry_id'   => 1
            ],
            [
                'question'      => 'Is the problem /market under served?',
                'answer'        => implode(',', ['Yes', 'Possible', 'Sometimes', 'No']),
                'industry_id'   => 3
            ],
            [
                'question'      => 'Are there alternatives in the market for customers to access?',
                'answer'        => implode(',', ['Yes', 'Possible', 'Sometimes', 'No']),
                'industry_id'   => 1
            ]
        ];

        foreach ($market as $m) {
            MarketOpportunity::create($m);
        }
    }
}
