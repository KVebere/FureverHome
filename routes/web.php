<?php

use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdopterController;
use App\Http\Controllers\SavedMatchController;
use App\Http\Controllers\AuthController;

Route::get('/', [AdopterController::class, 'chooseRole'])->name('start');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/match', [AnimalController::class, 'match'])->name('match');

Route::get('/discover', [AnimalController::class, 'discover'])
    ->name('discover');

Route::get('/animals/{animal}', [AnimalController::class, 'show'])
    ->name('animals.show');

Route::get('/animals/{animal}', [AnimalController::class, 'show'])
    ->name('animals.show');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');
    Route::post('/login', [AuthController::class, 'login'])
        ->middleware('throttle:6,1');
    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::get('/adopters/choose-role', [AdopterController::class, 'chooseRole'])
    ->name('adopters.choose-role');
Route::get('/adopters/create', [AdopterController::class, 'create'])
    ->name('adopters.create');
Route::post('/adopters', [AdopterController::class, 'store'])
    ->name('adopters.store');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::get('/savedMatches', [SavedMatchController::class, 'index'])
        ->name('saved-matches.index');
    Route::post('/saved-matches', [SavedMatchController::class, 'store'])
        ->name('saved-matches.store');

    Route::get('/profile', [ProfileController::class, 'edit']);
    Route::patch('/profile', [ProfileController::class, 'update']);
});
