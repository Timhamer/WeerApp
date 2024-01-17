<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WeatherConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            DB::table('weatherconditions')->insert([
                ['temperature_min' => '10', 'temperature_max' => '30', 'wind_speed' => '20'],
                ['temperature_min' => '5', 'temperature_max' => '8', 'wind_speed' => '30'],
                ['temperature_min' => '25', 'temperature_max' => '30', 'wind_speed' => '10'],
                ['temperature_min' => '18', 'temperature_max' => '35', 'wind_speed' => '24'],
                ['temperature_min' => '0', 'temperature_max' => '10', 'wind_speed' => '83'],
            ]);
        }
    }
}
