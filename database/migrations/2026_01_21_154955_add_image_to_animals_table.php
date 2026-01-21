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
        Schema::create('animal_images', function (Blueprint $table) {
            $table->id('image_id');

            $table->unsignedBigInteger('animal_id');
            $table->foreign('animal_id')
                ->references('animal_id')
                ->on('animals')
                ->cascadeOnDelete();

            $table->unsignedBigInteger('uploaded_by')->nullable();
            $table->foreign('uploaded_by')
                ->references('id')
                ->on('users')
                ->nullOnDelete();

            $table->string('image_path');
            $table->boolean('is_primary')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animal_images');

    }
};
