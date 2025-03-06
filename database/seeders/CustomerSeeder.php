<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('customers')->insert([

            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'phone' => Str::random(10),
            'address' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
