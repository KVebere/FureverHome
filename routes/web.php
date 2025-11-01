<?php

use App\Models\shelters;
use App\Models\Animals;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'animals' => Animals::all()
    ]);
});

Route::get('/test', function () {
    return view('test', [
        'shelters' => Shelters::all()
    ]);
});

