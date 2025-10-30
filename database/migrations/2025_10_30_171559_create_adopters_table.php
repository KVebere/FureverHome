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
        DB::statement("CREATE TYPE experience_level AS ENUM ('None', 'Semi-Experienced', 'Experienced', 'Advanced Experience');");
        DB::statement("CREATE TYPE work_schedule AS ENUM ('Home Full-Time', 'Home Part-Time', 'Away Full-Time', 'Away Part-Time');");

        Schema::create('adopters', function (Blueprint $table) {
            $table->id('adopter_id');
            $table->string('adopter_first_name', 50);
            $table->string('adopter_middle_name', 50)->nullable();
            $table->string('adopter_last_name', 50);
            $table->string('adopter_email', 150);
            $table->string('adopter_phone', 15);
            $table->string('adopter_address_1', 50);
            $table->string('adopter_address_2', 50)->nullable();
            $table->string('adopter_city', 30);
            $table->string('adopter_postcode', 10);
            $table->enum('experience_level', ['None', 'Semi-Experienced', 'Experienced', 'Advanced Experience']);
            $table->boolean('has_children');
            $table->boolean('has_cats');
            $table->boolean('has_dogs');
            $table->boolean('has_other_pets');
            $table->enum('adopter_home_type', ['Apartment', 'House with garden', 'Farm', 'Other']);
            $table->enum('work_schedule', ['Home Full-Time', 'Home Part-Time', 'Away Full-Time', 'Away Part-Time']);
            $table->enum('adopter_activity_level', ['Low', 'Medium', 'High']);
            $table->text('adopter_additional_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adopters');
        DB::statement('DROP TYPE IF EXISTS experience_level;');
        DB::statement('DROP TYPE IF EXISTS work_schedule;');
    }
};
