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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name');
            $table->string('description');
            $table->float('price');
            $table->integer('stock')->unsigned();
            $table->string('image');
            $table->boolean('active');
            $table->timestamps();

            $table->foreignUuid('business_id');
            $table->foreignUuid('category_id');
            $table->foreignUuid('material_id');
            $table->foreignUuid('style_id');
            $table->foreignUuid('color_id');
            $table->foreignUuid('size_id');

//            $table->foreign('business_id')
//                ->references('id')->on('business')->cascadeOnDelete();
//
//            $table->foreign('category_id')
//                ->references('id')->on('categories')->cascadeOnDelete();
//
//            $table->foreign('material_id')
//                ->references('id')->on('materials')->cascadeOnDelete();
//
//            $table->foreign('style_id')
//                ->references('id')->on('styles')->cascadeOnDelete();
//
//            $table->foreign('color_id')
//                ->references('id')->on('colors')->cascadeOnDelete();
//
//            $table->foreign('size_id')
//                ->references('id')->on('sizes')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
