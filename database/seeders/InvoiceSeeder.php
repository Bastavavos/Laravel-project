<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Invoice::factory()
            ->count(10)
            ->create();

        Invoice::all()->each(function ($invoice) {
            for ($i = 1; $i <= rand(1, 3); $i++) {
                $invoice->status()->attach(Status::all()->where('number', '=', $i));
            }
            $invoice->product()
                ->attach(Product::all()
                    ->random(rand(1, 3))->pluck('id'), ['product_quantity' => rand(1, 10)]);
        });
    }
}
