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
        DB::table('windDirection')->insert([
            'direction' => 'N',
        ]);
        DB::table('windDirection')->insert([
            'direction' => 'NE',
        ]);
        DB::table('windDirection')->insert([
            'direction' => 'E',
        ]);
        DB::table('windDirection')->insert([
            'direction' => 'SE',
        ]);
        DB::table('windDirection')->insert([
            'direction' => 'S',
        ]);
        DB::table('windDirection')->insert([
            'direction' => 'SW',
        ]);
        DB::table('windDirection')->insert([
            'direction' => 'W',
        ]);
        DB::table('windDirection')->insert([
            'direction' => 'NW',
        ]);
        
    }
}
