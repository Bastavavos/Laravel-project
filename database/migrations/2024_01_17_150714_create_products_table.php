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

            // Ajout de la clé étrangère pour référencer l'utilisateur propriétaire
            $table->foreignUuid('user_id')->constrained('users');

            $table->foreignUuid('category_id');
            $table->foreignUuid('material_id');
            $table->foreignUuid('style_id');
            $table->foreignUuid('color_id');
            $table->foreignUuid('size_id');
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
