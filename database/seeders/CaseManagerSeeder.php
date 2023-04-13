<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\CaseManager;

class CaseManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $caseManager = [
            'name'      => 'Mahboobulrahman Sabiry',
            'email'     => 'msabiry@gmail.com',
            'password'  => Hash::make('sabiry')
        ];

        CaseManager::create($caseManager);
    }
}
