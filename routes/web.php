<?php

use App\Models\shelters;
use App\Models\Animals;
use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/match', [AnimalController::class, 'match']);

Route::get('/discover', fn () => view('discover'));

Route::get('/animals/{animal}', [AnimalController::class, 'show'])
    ->name('animals.show');
