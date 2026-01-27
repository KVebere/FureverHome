<?php

namespace App\Http\Controllers;

use App\Models\SavedMatch;
use App\Services\AdopterMatchService;
use Illuminate\Http\Request;

class SavedMatchController extends Controller
{
    public function __construct(private AdopterMatchService $matchService)
    {
    }

    public function index()
    {
        $adopter = auth()->user()->adopter;
        if (!$adopter) {
            return redirect()->route('adopters.create');
        }

        $saved = SavedMatch::with('animal.primaryImage')
            ->where('adopter_id', $adopter->adopter_id)
            ->latest()
            ->get();

        return view('savedMatches', compact('saved'));
    }

    public function store(Request $request)
    {
        $adopter = $request->user()->adopter;
        if (!$adopter) {
            return response()->json([
                'message' => 'Create an adopter profile before saving matches.',
            ], 409);
        }

        $data = $request->validate([
            'animal_id' => 'required|integer|exists:animals,animal_id',
        ]);

        SavedMatch::firstOrCreate([
            'adopter_id' => $adopter->adopter_id,
            'animal_id' => $data['animal_id'],
        ]);

        return response()->json(['message' => 'Saved']);
    }
}
