<?php

use App\Models\shelters;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/test', function () {
    return view('test', [
        'shelters' => Shelters::all()
    ]);
});
