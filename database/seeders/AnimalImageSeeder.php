<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalImageSeeder extends Seeder
{
    public function run(): void
    {
        $animals = DB::table('animals')->get()->keyBy('animal_name');

        DB::table('animal_images')->insert([
            // Buddy
            [
                'animal_id' => $animals['Buddy']->animal_id,
                'image_path' => 'animals/buddy_1.jpg',
                'is_primary' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Misty
            [
                'animal_id' => $animals['Misty']->animal_id,
                'image_path' => 'animals/misty_1.png',
                'is_primary' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Sparkspot
            [
                'animal_id' => $animals['Sparkspot']->animal_id,
                'image_path' => 'animals/sparkspot_1.jpg',
                'is_primary' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Rasa
            [
                'animal_id' => $animals['Rasa']->animal_id,
                'image_path' => 'animals/rasa_1.jpg',
                'is_primary' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Nairn
            [
                'animal_id' => $animals['Nairn']->animal_id,
                'image_path' => 'animals/nairn_1.jpg',
                'is_primary' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Jude
            [
                'animal_id' => $animals['Jude']->animal_id,
                'image_path' => 'animals/jude_1.jpg',
                'is_primary' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Lily
            [
                'animal_id' => $animals['Lily']->animal_id,
                'image_path' => 'animals/lily_1.jpg',
                'is_primary' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Rika
            [
                'animal_id' => $animals['Rika']->animal_id,
                'image_path' => 'animals/rika_1.jpg',
                'is_primary' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Kombo
            [
                'animal_id' => $animals['Detective Kombo']->animal_id,
                'image_path' => 'animals/kombo_1.jpg',
                'is_primary' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}





