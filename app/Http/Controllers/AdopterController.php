<?php

namespace App\Http\Controllers;

use App\Models\Adopter;
use App\Http\Requests\AdopterProfileRequest;

class AdopterController extends Controller
{
    public function chooseRole()
    {
        return view('adopters.choose-role');
    }

    public function create()
    {
        if (!auth()->check()) {
            return redirect()
                ->route('register')
                ->with('info', 'Create an account to start an adopter profile.');
        }

        if (auth()->user()->adopter) {
            return redirect()->route('home');
        }

        return view('adopters.create');
    }

    public function store(AdopterProfileRequest $request)
    {
        $data = $request->validated();

        $data['has_children'] = $request->boolean('has_children');
        $data['has_cats'] = $request->boolean('has_cats');
        $data['has_dogs'] = $request->boolean('has_dogs');
        $data['has_other_pets'] = $request->boolean('has_other_pets');

        if (!$request->user()) {
            return redirect()
                ->route('register')
                ->with('info', 'Create an account to save your adopter profile.');
        }

        $user = $request->user();
        $data['adopter_email'] = $user->email;

        $user->adopter()->updateOrCreate(['user_id' => $user->id], $data);

        return redirect()->route('home');
    }
}
