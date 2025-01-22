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
        Schema::create('recipe_ingredient', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recipe_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->decimal('quantity');
            $table->string('unit'); // e.g., gram, cup, tablespoon
            $table->foreign('recipe_id')->references('id')->on('recipes');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe_ingredients');
    }
};
