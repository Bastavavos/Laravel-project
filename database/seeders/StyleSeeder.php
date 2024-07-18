<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $styles = ['Old', 'New', 'Refined', 'Artistic'];

        foreach ($styles as $style) {
            DB::table('styles')->insert([
                'id' => uuid_create(),
                'name' => $style]);
        }
    }
}
