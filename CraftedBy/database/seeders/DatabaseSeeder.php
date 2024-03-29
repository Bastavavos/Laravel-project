<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\City;
use App\Models\User;
use App\Models\ZipCode;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StyleSeeder::class,
            MaterialSeeder::class,
            ColorSeeder::class,
            CategorySeeder::class,
            ThemeSeeder::class,
            UserSeeder::class,
            BusinessSeeder::class,
            ProductSeeder::class,
            StatuSeeder::class,
            InvoiceSeeder::class,
        ]);
    }
}
