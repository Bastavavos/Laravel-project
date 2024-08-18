<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materials = ['Wood', 'Silver', 'Gold', '100% Natural', 'Allergen-free'];

        foreach ($materials as $material) {
            DB::table('materials')->insert([
                'id' => uuid_create(),
                'name' => $material]);
        }
    }
}
