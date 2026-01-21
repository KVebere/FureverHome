<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalSeeder extends Seeder
{
    public function run(): void
    {
        $shelters = DB::table('shelters')->get();

        $happyTailsId = $shelters->first()->shelter_id;
        $northernPawsId = $shelters->last()->shelter_id;

        DB::table('animals')->insert([
            // Buddy – Golden Retriever
            [
                'shelter_id' => $happyTailsId,
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

            // Misty – British Shorthair
            [
                'shelter_id' => $happyTailsId,
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
            ],

            // Sparkspot – Calico Cat
            [
                'shelter_id' => $northernPawsId,
                'animal_name' => 'Sparkspot',
                'animal_age' => 1,
                'animal_status' => 'Available',
                'animal_species' => 'Cat',
                'animal_breed' => 'Calico',
                'animal_gender' => 'Female',
                'animal_description' => 'Playful calico cat with a curious personality.',
                'animal_temperament' => 'Energetic, curious, social',
                'good_with_children' => true,
                'good_with_dogs' => false,
                'good_with_cats' => true,
                'can_be_left_alone' => true,
                'working_animal' => false,
                'needs_garden' => false,
                'animal_home_type' => 'Apartment',
                'animal_energy_level' => 'Medium',
                'medical_notes' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Rasa – Somali Cat
            [
                'shelter_id' => $northernPawsId,
                'animal_name' => 'Rasa',
                'animal_age' => 4,
                'animal_status' => 'Available',
                'animal_species' => 'Cat',
                'animal_breed' => 'Somali',
                'animal_gender' => 'Male',
                'animal_description' => 'Highly intelligent and active cat.',
                'animal_temperament' => 'Alert, playful, affectionate',
                'good_with_children' => true,
                'good_with_dogs' => true,
                'good_with_cats' => true,
                'can_be_left_alone' => false,
                'working_animal' => false,
                'needs_garden' => false,
                'animal_home_type' => 'House with garden',
                'animal_energy_level' => 'High',
                'medical_notes' => 'Requires mental stimulation',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Nairn – Shiba Inu
            [
                'shelter_id' => $northernPawsId,
                'animal_name' => 'Nairn',
                'animal_age' => 5,
                'animal_status' => 'Available',
                'animal_species' => 'Dog',
                'animal_breed' => 'Shiba Inu',
                'animal_gender' => 'Male',
                'animal_description' => 'Independent dog with strong personality.',
                'animal_temperament' => 'Alert, confident, reserved',
                'good_with_children' => false,
                'good_with_dogs' => false,
                'good_with_cats' => false,
                'can_be_left_alone' => true,
                'working_animal' => false,
                'needs_garden' => true,
                'animal_home_type' => 'House with garden',
                'animal_energy_level' => 'Medium',
                'medical_notes' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Jude – Dachshund
            [
                'shelter_id' => $happyTailsId,
                'animal_name' => 'Jude',
                'animal_age' => 6,
                'animal_status' => 'Available',
                'animal_species' => 'Dog',
                'animal_breed' => 'Dachshund',
                'animal_gender' => 'Male',
                'animal_description' => 'Loyal companion with a strong bond to owners.',
                'animal_temperament' => 'Affectionate, stubborn, alert',
                'good_with_children' => true,
                'good_with_dogs' => true,
                'good_with_cats' => false,
                'can_be_left_alone' => false,
                'working_animal' => false,
                'needs_garden' => false,
                'animal_home_type' => 'Apartment',
                'animal_energy_level' => 'Low',
                'medical_notes' => 'Back care recommended',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
