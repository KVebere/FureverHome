<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShelterSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('shelters')->insert([
            'shelter_name' => 'Furever Home Rescue',
            'shelter_email' => 'contact@fureverhome.org',
            'shelter_phone' => '07123456789',
            'shelter_address_1' => '123 Rescue Lane',
            'shelter_address_2' => 'Suite A',
            'shelter_city' => 'London',
            'shelter_postcode' => 'E1 6AN',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


    }
}
