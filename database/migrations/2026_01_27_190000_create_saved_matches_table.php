<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('saved_matches', function (Blueprint $table) {
            $table->id('saved_matches_id');
            $table->unsignedBigInteger('adopter_id');
            $table->unsignedBigInteger('animal_id');

            $table->enum('status', ['liked', 'discarded'])->default('liked');

            $table->timestamps();

            $table->foreign('adopter_id')
                ->references('adopter_id')
                ->on('adopters')
                ->cascadeOnDelete();

            $table->foreign('animal_id')
                ->references('animal_id')
                ->on('animals')
                ->cascadeOnDelete();

            $table->unique(['adopter_id', 'animal_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('saved_matches');
    }
};
