<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SalesChannels;
use App\Models\BusinessIndustry;

class SalesChannelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sales = [
            [
                'question'      => 'Do you offer this service/product directly consumers ?',
                'answer'        => implode(',', ['Yes', 'Possible', 'Sometimes', 'No']),
                'industry_id'   => 1
            ],
            [
                'question'      => 'Is the problem /market under served?',
                'answer'        => implode(',', ['Yes', 'Possible', 'Sometimes', 'No']),
                'industry_id'   => 2
            ],
            [
                'question'      => 'Are there alternatives in the market for customers to access?',
                'answer'        => implode(',', ['Yes', 'Possible', 'Sometimes', 'No']),
                'industry_id'   => 3
            ]
        ];

        foreach ($sales as $sale) {
            SalesChannels::create($sale);
        }
    }
}
