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
        DB::statement('DROP TYPE IF EXISTS animal_status;');
        DB::statement('DROP TYPE IF EXISTS species;');
        DB::statement('DROP TYPE IF EXISTS gender;');
        DB::statement('DROP TYPE IF EXISTS home_type;');
        DB::statement('DROP TYPE IF EXISTS activity_level;');

        DB::statement("CREATE TYPE animal_status AS ENUM ('Available', 'Adopted', 'Pending', 'Fostered');");
        DB::statement("CREATE TYPE species AS ENUM ('Dog', 'Cat', 'Other');");
        DB::statement("CREATE TYPE gender AS ENUM ('Male', 'Female', 'Unknown');");
        DB::statement("CREATE TYPE home_type AS ENUM ('Apartment', 'House with garden', 'Farm', 'Other');");
        DB::statement("CREATE TYPE activity_level AS ENUM ('Low', 'Medium', 'High');");

        Schema::create('animals', function (Blueprint $table) {
            $table->id('animal_id');
            $table->unsignedBigInteger('shelter_id');
            $table->foreign('shelter_id')
                ->references('shelter_id')
                ->on('shelters')
                ->cascadeOnDelete();
            $table->string('animal_name', 100);
            $table->integer('animal_age');
            $table->enum('animal_status', ['Available', 'Adopted', 'Pending', 'Fostered']);
            $table->enum('animal_species', ['Dog', 'Cat', 'Other']);
            $table->string('animal_breed', 50);
            $table->enum('animal_gender', ['Male', 'Female', 'Unknown']);
            $table->text('animal_description');
            $table->text('animal_temperament');
            $table->boolean('good_with_children');
            $table->boolean('good_with_dogs');
            $table->boolean('good_with_cats');
            $table->boolean('can_be_left_alone');
            $table->boolean('working_animal');
            $table->boolean('needs_garden');
            $table->enum('animal_home_type', ['Apartment', 'House with garden', 'Farm', 'Other']);
            $table->enum('animal_energy_level', ['Low', 'Medium', 'High']);
            $table->text('medical_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
