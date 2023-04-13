<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(CaseManagerSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(BusinessSeeder::class);
        $this->call(BusinessIndustrySeeder::class);
        $this->call(BusinessOfferSeeder::class);
        $this->call(DemandSeeder::class);
        $this->call(SalesChannelsSeeder::class);
        $this->call(MarketOpportunitySeeder::class);
    }
}
