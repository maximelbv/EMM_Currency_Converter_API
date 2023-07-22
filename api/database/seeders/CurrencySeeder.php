<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            ['name' => 'euro', 'code' => 'EUR'],
            ['name' => 'dollar', 'code' => 'USD'],
            ['name' => 'bitcoin', 'code' => 'BTC'],
        ];

        foreach ($currencies as $currency) {
            Currency::create($currency);
        }
    }
}