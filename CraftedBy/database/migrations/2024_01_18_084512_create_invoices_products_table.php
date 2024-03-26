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
        Schema::create('invoice_product', function (Blueprint $table) {
            $table->foreignUuid('invoice_id');
            $table->foreignUuid('product_id');

//            $table->foreign('invoice_id')
//                ->references('id')
//                ->on('invoices');

            $table->foreign('invoice_id')
                ->references('id')
                ->on('invoices')->onDelete('cascade');

            $table->foreign('product_id')
                ->references('id')
                ->on('products')->onDelete('cascade');

            $table->integer('product_quantity')->unsigned();
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
