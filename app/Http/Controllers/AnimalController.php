<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animals; // make sure you import your model

class AnimalController extends Controller
{
    // Show a single animal profile
    public function show($id)
    {
        $animal = Animals::with('primaryImage')->findOrFail($id);

        return view('animals.show', compact('animal'));
    }
    public function match()
    {
        $animals = Animals::with('primaryImage')
            ->where('animal_status', 'Available')
            ->latest()
            ->get();

        return view('match', compact('animals'));
    }
}
