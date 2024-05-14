<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\City;

class CountryCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::create(['name' => 'United States']);
        Country::create(['name' => 'United Kingdom']);
        Country::create(['name' => 'Germany']);

        City::create(['country_id' => 1, 'name' => 'New York']);
        City::create(['country_id' => 1, 'name' => 'Washington']);
        City::create(['country_id' => 2, 'name' => 'London']);
        City::create(['country_id' => 2, 'name' => 'Birmingham']);
        City::create(['country_id' => 3, 'name' => 'Berlin']);
        City::create(['country_id' => 3, 'name' => 'Stuttgart']);
    }
}
