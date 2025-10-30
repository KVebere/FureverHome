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
        Schema::create('shelters', function (Blueprint $table) {
            $table->id('shelter_id');
            $table->string('shelter_name', 150);
            $table->string('shelter_email', 150);
            $table->string('shelter_phone', 15);
            $table->string('shelter_address_1', 50);
            $table->string('shelter_address_2', 50)->nullable();
            $table->string('shelter_city', 30);
            $table->string('shelter_postcode', 10);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shelters');
    }
};
