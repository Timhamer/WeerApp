<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'Timhamer',
            'email' => 'Tfhammersma@gmail.com',
            'first_name' => 'Tim',
            'last_name' => 'Hammersma',
            'password' => Hash::make('Test1234!'),
            'premium' => '1', // '1' => 'true', '0' => 'false
            'role' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
