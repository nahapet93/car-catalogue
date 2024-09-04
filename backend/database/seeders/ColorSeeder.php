<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('colors')->delete();

        DB::table('colors')->insert([
            0 => [
                'id' => 1,
                'name' => 'Black'
            ], 1 => [
                'id' => 2,
                'name' => 'White'
            ], 2 => [
                'id' => 3,
                'name' => 'Silver'
            ], 3 => [
                'id' => 4,
                'name' => 'Blue'
            ]
        ]);
    }
}
