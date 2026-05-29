<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LotingController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/loting', [LotingController::class, 'loting']);