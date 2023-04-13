<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BusinessOffer;
use App\Models\BusinessIndustry;

class BusinessOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $businessOffers = [
            [
                'question'      => 'Are you sure you want to use SureGuide?',
                'answer'        => 'yes',
                'industry_id'   => 1
            ],
            [
                'question'      => 'Are\'nt you agree that SureGuide is the best?',
                'answer'        => 'yes',
                'industry_id'   => 1
            ],
            [
                'question'      => 'Are you sure',
                'answer'        => 'yes',
                'industry_id'   => 1
            ]
        ];

        foreach ($businessOffers as $bsOffer) {
            BusinessOffer::create($bsOffer);
        }
    }
}
