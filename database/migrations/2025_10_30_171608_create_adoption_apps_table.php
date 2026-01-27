<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('adoption_apps', function (Blueprint $table) {
            $table->id('adoption_app_id');
            $table->unsignedBigInteger('animal_id');
            $table->foreign('animal_id')
                ->references('animal_id')
                ->on('animals')
                ->cascadeOnDelete();
            $table->unsignedBigInteger('adopter_id');
            $table->foreign('adopter_id')
                ->references('adopter_id')
                ->on('adopters')
                ->cascadeOnDelete();
            $table->enum('app_status', ['Pending', 'Approved', 'Rejected']);
            $table->date('app_date');
            $table->text('app_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adoption_apps');
    }
};
