<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animals; // make sure you import your model

class AnimalController extends Controller
{
    // Show a single animal profile
    public function show($id)
    {
        // Fetch the animal with its primary image
        $animal = Animals::with('primaryImage')->findOrFail($id);

        // Return the view and pass the animal data
        return view('animals.show', compact('animal'));
    }
}
