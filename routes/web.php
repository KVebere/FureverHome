<?php

use App\Models\shelters;
use App\Models\Animals;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'animals' => Animals::latest()->take(3)->get()
    ]);
});

Route::get('/match', function () {
    return view('match');
});

Route::get('/discover', function () {
    return view('discover');
});