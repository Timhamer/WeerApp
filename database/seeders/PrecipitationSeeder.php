<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PrecipitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('precipitations')->insert([
            'type' => 'Rain',
        ]);

        DB::table('precipitations')->insert([
            'type' => 'Hail',
        ]);

        DB::table('precipitations')->insert([
            'type' => 'Snow',
        ]);
    }
}
