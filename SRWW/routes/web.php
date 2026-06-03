<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\loginController;
Route::get('/', [HomeController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/login', [loginController::class, 'showLogin']);
Route::post('/login', [loginController::class, 'login']);