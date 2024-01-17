<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WindDirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wind_Directions')->insert([
            'direction' => 'N',
        ]);
        DB::table('wind_Directions')->insert([
            'direction' => 'NE',
        ]);
        DB::table('wind_Directions')->insert([
            'direction' => 'E',
        ]);
        DB::table('wind_Directions')->insert([
            'direction' => 'SE',
        ]);
        DB::table('wind_Directions')->insert([
            'direction' => 'S',
        ]);
        DB::table('wind_Directions')->insert([
            'direction' => 'SW',
        ]);
        DB::table('wind_Directions')->insert([
            'direction' => 'W',
        ]);
        DB::table('wind_Directions')->insert([
            'direction' => 'NW',
        ]);
        
    }
}
