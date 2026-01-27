<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adopter extends Model
{
    protected $primaryKey = 'adopter_id';

    protected $fillable = [
        'user_id',
        'adopter_first_name',
        'adopter_middle_name',
        'adopter_last_name',
        'adopter_email',
        'adopter_phone',
        'adopter_address_1',
        'adopter_address_2',
        'adopter_city',
        'adopter_postcode',
        'experience_level',
        'has_children',
        'has_cats',
        'has_dogs',
        'has_other_pets',
        'adopter_home_type',
        'work_schedule',
        'adopter_activity_level',
        'adopter_additional_info',
    ];
}
