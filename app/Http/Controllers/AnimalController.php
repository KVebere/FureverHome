<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animals;
use App\Services\AdopterMatchService;
use App\Models\SavedMatch;

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

    public function discover(Request $request)
    {
        $animals = Animals::with('primaryImage')
            ->where('animal_status', 'Available')
            ->when($request->filled('species'), function ($query) use ($request) {
                $query->where('animal_species', $request->string('species'));
            })
            ->when($request->filled('energy'), function ($query) use ($request) {
                $query->where('animal_energy_level', $request->string('energy'));
            })
            ->when($request->filled('home_type'), function ($query) use ($request) {
                $query->where('animal_home_type', $request->string('home_type'));
            })
            ->when($request->filled('good_with_children'), function ($query) {
                $query->where('good_with_children', true);
            })
            ->when($request->filled('good_with_dogs'), function ($query) {
                $query->where('good_with_dogs', true);
            })
            ->when($request->filled('good_with_cats'), function ($query) {
                $query->where('good_with_cats', true);
            })
            ->latest()
            ->get();

        return view('discover', [
            'animals' => $animals,
            'filters' => $request->only([
                'species',
                'energy',
                'home_type',
                'good_with_children',
                'good_with_dogs',
                'good_with_cats',
            ]),
        ]);
    }

    public function match()
    {
        $animalsQuery = Animals::with('primaryImage')
            ->where('animal_status', 'Available');

        $adopter = $this->matchService->resolveAdopter();

        if ($adopter) {
            $swipedAnimalIds = SavedMatch::where('adopter_id', $adopter->adopter_id)
                ->pluck('animal_id');

            $animals = $animalsQuery
                ->whereNotIn('animal_id', $swipedAnimalIds)
                ->get();

            $animals = $this->matchService->rankAnimals($animals, $adopter);
        } else {
            $animals = $animalsQuery
                ->latest()
                ->get();
        }

        return view('match', compact('animals'));
    }
}

