<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShelterSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('shelters')->insert([
            [
                'shelter_name' => 'Happy Tails Rescue',
                'shelter_email' => 'contact@happytails.org',
                'shelter_phone' => '07123456789',
                'shelter_address_1' => '12 Paw Street',
                'shelter_address_2' => 'Unit 3',
                'shelter_city' => 'London',
                'shelter_postcode' => 'E1 6AN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'shelter_name' => 'Northern Paws Sanctuary',
                'shelter_email' => 'info@northernpaws.org',
                'shelter_phone' => '07987654321',
                'shelter_address_1' => '88 Whisker Lane',
                'shelter_address_2' => null,
                'shelter_city' => 'Manchester',
                'shelter_postcode' => 'M1 2AB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
