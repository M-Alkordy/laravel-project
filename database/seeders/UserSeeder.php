<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'manger',
            'email' => 'manger@focal-x.agency',
            'password' => Hash::make('$WebDevelpersTeam#'),
            'type' => true,
        ]);
        DB::table('users')->insert([
            'name' => 'fadee',
            'email' => 'fadee@focal-x.agency',
            'password' => Hash::make('$WebDevelpersTeam#'),
            'type' => false,
        ]);
    }
}
