<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransmissionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transmission_types')->delete();

        DB::table('transmission_types')->insert([
            0 => [
                'id' => 1,
                'name' => 'Manual'
            ], 1 => [
                'id' => 2,
                'name' => 'Automatic'
            ], 2 => [
                'id' => 3,
                'name' => 'Variable'
            ]
        ]);
    }
}
