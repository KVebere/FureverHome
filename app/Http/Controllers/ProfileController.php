<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adopter;

class ProfileController extends Controller
{
    /**
     * Show the profile form
     */
    public function edit()
    {
        $user = \App\Models\User::first(); // 👈 TEMP FIX

        return view('profile.edit', [
            'adopter' => $user->adopter ?? null
        ]);
    }

    /**
     * Create or update adopter profile
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        $data = $request->validate([
            'adopter_first_name' => 'required|string|max:50',
            'adopter_last_name' => 'required|string|max:50',
            'experience_level' => 'required',
            'has_children' => 'boolean',
            'has_cats' => 'boolean',
            'has_dogs' => 'boolean',
            'has_other_pets' => 'boolean',
            'adopter_activity_level' => 'required',
        ]);

        // create OR update adopter profile
        $user->adopter()->updateOrCreate(
            ['user_id' => $user->id],
            $data
        );

        return redirect()->back()->with('success', 'Profile updated!');
    }
}
