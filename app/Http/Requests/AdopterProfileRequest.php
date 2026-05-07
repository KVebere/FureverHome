<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdopterProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'adopter_first_name' => 'required|string|max:50',
            'adopter_middle_name' => 'nullable|string|max:50',
            'adopter_last_name' => 'required|string|max:50',
            'adopter_email' => 'nullable|email|max:150',
            'adopter_phone' => ['required', 'regex:/^[0-9]{10,15}$/'],
            'adopter_address_1' => 'required|string|max:50',
            'adopter_address_2' => 'nullable|string|max:50',
            'adopter_city' => 'required|string|max:30',
            'adopter_postcode' => 'required|string|max:10',
            'experience_level' => 'required',
            'has_children' => 'sometimes|boolean',
            'has_cats' => 'sometimes|boolean',
            'has_dogs' => 'sometimes|boolean',
            'has_other_pets' => 'sometimes|boolean',
            'adopter_home_type' => 'required',
            'work_schedule' => 'required',
            'adopter_activity_level' => 'required',
            'adopter_additional_info' => 'nullable|string',
        ];
    }
}
