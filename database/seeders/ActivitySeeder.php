<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('weatherconditions')->insert([
            ['user_id' => '1', 'name' => 'Activity1', 'duration' => '20', 'location' => 'Sneek', 'weather_id' => '1', ],
            ['user_id' => '1', 'name' => 'Activity2', 'duration' => '200', 'location' => 'Sneek', 'weather_id' => '2', ],
            ['user_id' => '1', 'name' => 'Activity3', 'duration' => '120', 'location' => 'Sneek', 'weather_id' => '3', ],
            ['user_id' => '1', 'name' => 'Activity4', 'duration' => '60', 'location' => 'Sneek', 'weather_id' => '4', ],
            ['user_id' => '1', 'name' => 'Activity5', 'duration' => '20', 'location' => 'Sneek', 'weather_id' => '5', ],

        ]);
    }
}
