<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animals;

class HomeController extends Controller
{
    public function index()
    {
        $animals = Animals::latest()
            ->with('primaryImage')
            ->take(4)
            ->get();

        return view('home', compact('animals'));
    }
}
