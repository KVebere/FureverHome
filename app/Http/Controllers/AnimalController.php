<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animals; // make sure you import your model
use App\Services\AdopterMatchService;

class AnimalController extends Controller
{
    public function __construct(private AdopterMatchService $matchService)
    {
    }

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
            ->get();

        $adopter = $this->matchService->resolveAdopter();
        if ($adopter) {
            $animals = $this->matchService->rankAnimals($animals, $adopter);
        } else {
            $animals = $animals->sortByDesc('created_at')->values();
        }

        return view('match', compact('animals'));
    }
}
