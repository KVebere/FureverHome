<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdopterProfileRequest;
use App\Models\Adopter;

class ProfileController extends Controller
{
    /**
     * Show the profile form
     */
    public function edit()
    {
        $adopter = auth()->user()->adopter;
        if (!$adopter) {
            return redirect()->route('adopters.create');
        }

        return view('profile.edit', [
            'adopter' => $adopter
        ]);
    }

    /**
     * Create or update adopter profile
     */
    public function update(AdopterProfileRequest $request)
    {
        $user = $request->user();

        $data = $request->validated();

        $data['has_children'] = $request->boolean('has_children');
        $data['has_cats'] = $request->boolean('has_cats');
        $data['has_dogs'] = $request->boolean('has_dogs');
        $data['has_other_pets'] = $request->boolean('has_other_pets');

        $user->adopter()->updateOrCreate(
            ['user_id' => $user->id],
            $data
        );

        return redirect()->back()->with('success', 'Profile updated!');
    }
}
