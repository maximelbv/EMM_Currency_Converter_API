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
      Currency::create(["name" =>"Euro" , "code" => "EUR"]);
      Currency::create(["name" =>"Dollar" , "code" => "USD"]);
      Currency::create(["name" =>"Bitcoin" , "code" => "BTC"]);
    }
}