<?php

use App\Models\shelters;
use App\Models\Animals;
use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'animals' => Animals::latest()->take(4)->get()
    ]);
});

Route::get('/match', function () {
    return view('match');
});

Route::get('/discover', function () {
    return view('discover');
});

Route::get('/animals/{animal}', [AnimalController::class, 'show'])->name('animals.show');
