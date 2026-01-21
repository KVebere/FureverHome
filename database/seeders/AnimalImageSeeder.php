<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalImageSeeder extends Seeder
{
    public function run(): void
    {
        $buddyId = DB::table('animals')->where('animal_name', 'Buddy')->first()->animal_id;
        $mistyId = DB::table('animals')->where('animal_name', 'Misty')->first()->animal_id;

        DB::table('animal_images')->insert([
            [
                'animal_id' => $buddyId,
                'image_path' => 'animals/buddy.jpg',
                'is_primary' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => $mistyId,
                'image_path' => 'animals/misty.png',
                'is_primary' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

