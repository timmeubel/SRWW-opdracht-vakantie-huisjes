<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LotingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\loginController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/loting', function () {
    return view('loting');
});
Route::post('/loting', [LotingController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [loginController::class, 'login'])->name('login.store');

// Temporary route to inspect database content
Route::get('/debug-db', function () {
    return response()->json([
        'inschrijving' => \App\Models\Inschrijving::all(),
        'loting' => \App\Models\Loting::all(),
        'inschrijfronde' => \App\Models\Inschrijfronde::all(),
    ]);
});