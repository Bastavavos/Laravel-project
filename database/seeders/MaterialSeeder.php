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
        $materials = ['Wood', 'Iron', 'Silver', 'Gold', 'Diamond', 'Textile', 'Silk', 'Ceramic', 'Rubber', 'Clay',
            'Emerald', '100% Natural', 'Plastic-free', 'Allergen-free'];

        foreach ($materials as $material) {
            DB::table('materials')->insert([
                'id' => uuid_create(),
                'name' => $material]);
        }
    }
}
