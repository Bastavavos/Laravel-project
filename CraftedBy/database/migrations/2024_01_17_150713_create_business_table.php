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
        Schema::create('business', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name');
            $table->string('description');
            $table->string('history');
            $table->string('email');
            $table->string('address');
            $table->string('logo');
            $table->timestamps();

            $table->foreignUuid('zip_code_id');
            $table->foreignUuid('city_id');
            $table->foreignUuid('theme_id');

            $table->foreign('theme_id')
                ->references('id')->on('themes')->cascadeOnDelete();

            $table->foreign('zip_code_id')
                ->references('id')->on('zip_code')->cascadeOnDelete();

            $table->foreign('city_id')
                ->references('id')->on('cities')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business');
    }
};
