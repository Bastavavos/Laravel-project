<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
//    public function up(): void
//    {
//        Schema::create('invoices', function (Blueprint $table) {
//            $table->uuid('id')->primary();
//            $table->timestamps();
//            $table->foreignUuid('customer_id');
//            $table->foreign('customer_id')
//                ->references('id')
//                ->on('users')->onDelete('cascade');
//        });
//    }
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->uuid('customer_id'); // Define the customer_id column as a UUID
            $table->foreign('customer_id') // Set the foreign key constraint
            ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
