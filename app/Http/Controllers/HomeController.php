<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animals;
use App\Services\AdopterMatchService;

class HomeController extends Controller
{
    public function __construct(private AdopterMatchService $matchService)
    {
    }

    public function index()
    {
        $animals = Animals::latest()
            ->with('primaryImage')
            ->take(4)
            ->get();

        $adopter = $this->matchService->resolveAdopter();
        if ($adopter) {
            $recommended = $this->matchService
                ->rankAnimals(
                    Animals::with('primaryImage')
                        ->where('animal_status', 'Available')
                        ->get(),
                    $adopter
                )
                ->take(4);
        } else {
            $recommended = collect();
        }

        return view('home', compact('animals', 'recommended'));
    }
}
