<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = ['Black', 'White', 'Red', 'Green', 'Blue', 'Yellow', 'Purple', 'Orange', 'Brown', 'Pink', 'Grey'];

        foreach ($colors as $color) {
            DB::table('colors')->insert([
                'id' => uuid_create(),
                'name' => $color
            ]);
        }
    }
}
