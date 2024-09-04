<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EngineTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('engine_types')->delete();

        DB::table('engine_types')->insert([
            0 => [
                'id' => 1,
                'name' => 'Petrol'
            ], 1 => [
                'id' => 2,
                'name' => 'Diesel'
            ], 2 => [
                'id' => 3,
                'name' => 'Electric'
            ]
        ]);
    }
}
