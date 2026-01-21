<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalSeeder extends Seeder
{
    public function run(): void
    {
        $shelterId = DB::table('shelters')->first()->shelter_id;

        DB::table('animals')->insert([
            [
                'shelter_id' => $shelterId,
                'animal_name' => 'Buddy',
                'animal_age' => 3,
                'animal_status' => 'Available',
                'animal_species' => 'Dog',
                'animal_breed' => 'Golden Retriever',
                'animal_gender' => 'Male',
                'animal_description' => 'Friendly and energetic golden retriever.',
                'animal_temperament' => 'Loyal, playful, gentle',
                'good_with_children' => true,
                'good_with_dogs' => true,
                'good_with_cats' => true,
                'can_be_left_alone' => false,
                'working_animal' => false,
                'needs_garden' => true,
                'animal_home_type' => 'House with garden',
                'animal_energy_level' => 'High',
                'medical_notes' => 'Up to date with vaccinations',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'shelter_id' => $shelterId,
                'animal_name' => 'Misty',
                'animal_age' => 2,
                'animal_status' => 'Available',
                'animal_species' => 'Cat',
                'animal_breed' => 'British Shorthair',
                'animal_gender' => 'Female',
                'animal_description' => 'Calm indoor cat who enjoys quiet environments.',
                'animal_temperament' => 'Affectionate, calm, independent',
                'good_with_children' => false,
                'good_with_dogs' => false,
                'good_with_cats' => true,
                'can_be_left_alone' => true,
                'working_animal' => false,
                'needs_garden' => false,
                'animal_home_type' => 'Apartment',
                'animal_energy_level' => 'Low',
                'medical_notes' => 'Neutered, no known conditions',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

