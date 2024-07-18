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
        Schema::create('invoice_status', function (Blueprint $table) {
            $table->foreignUuid('invoice_id');
            $table->foreignUuid('status_id');

            $table->foreign('invoice_id')
                ->references('id')
                ->on('invoices');

            $table->foreign('status_id')
                ->references('id')
                ->on('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices_status');
    }
};
