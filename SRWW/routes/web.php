<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LotingController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/loting', function () {
    return view('loting');
});
Route::post('/loting', [LotingController::class, 'store']);

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', function () {
    return view('register');
});