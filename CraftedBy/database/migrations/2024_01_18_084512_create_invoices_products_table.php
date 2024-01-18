<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices_products', function (Blueprint $table) {
            $table->foreignUuid('invoice_id');
            $table->foreignUuid('product_id');
            $table->integer('product_quantity');

            $table->foreign('invoice_id')
                ->references('id')->on('invoices')->cascadeOnDelete();

            $table->foreign('product_id')
                ->references('id')->on('products')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices_products');
    }
};
