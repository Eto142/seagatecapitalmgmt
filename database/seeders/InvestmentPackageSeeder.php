<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InvestmentPackage;

class InvestmentPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        InvestmentPackage::create([
            'name' => 'Basic Plan PACKAGE',
            'daily_roi' => 2.00,
            'minimum_investment' => 500.00,
            'duration_days' => 30,
            'instant_withdrawal' => true,
            'minimum_withdrawal' => 5.00,
        ]);

        // Add more packages as needed
        InvestmentPackage::create([
            'name' => 'Premium Plan PACKAGE',
            'daily_roi' => 3.50,
            'minimum_investment' => 1000.00,
            'duration_days' => 60,
            'instant_withdrawal' => true,
            'minimum_withdrawal' => 10.00,
        ]);

        InvestmentPackage::create([
            'name' => 'Elite Plan PACKAGE',
            'daily_roi' => 5.00,
            'minimum_investment' => 5000.00,
            'duration_days' => 90,
            'instant_withdrawal' => false,
            'minimum_withdrawal' => 50.00,
        ]);
    }
}
