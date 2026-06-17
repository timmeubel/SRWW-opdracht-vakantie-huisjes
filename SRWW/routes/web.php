<?php

use App\Http\Controllers\Admin\CMSController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\LotingController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/loting', function () {
    return view('loting');
});
Route::post('/loting', [LotingController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');

Route::get('/verify-email/notice', function () {
    return view('verify-email');
})->name('verify.notice');

Route::get('/verify-email/{token}', [RegisterController::class, 'verifyEmail'])->name('verify.email');

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [loginController::class, 'login'])->name('login.store');
Route::get('/logout', [loginController::class, 'logout'])->name('logout');
Route::get('/uitloggen', [loginController::class, 'logout'])->name('uitloggen');

// Temporary route to inspect database content
Route::get('/debug-db', function () {
    return response()->json([
        'inschrijving' => \App\Models\Inschrijving::all(),
        'loting' => \App\Models\Loting::all(),
        'inschrijfronde' => \App\Models\Inschrijfronde::all(),
    ]);
});

Route::get('/admin', [adminController::class, 'admin'])->name('admin');;

Route::prefix('admin/cms')->name('admin.cms.')->group(function () {
    Route::get('/', [CMSController::class, 'index'])->name('index');
    Route::put('/house/{id}', [CMSController::class, 'updateHouse'])->name('house.update');
    Route::post('/settings', [CMSController::class, 'updateSettings'])->name('settings.update');
});
Route::prefix('admin/cms')->name('admin.cms.')->group(function () {
    Route::get('/', [CMSController::class, 'index'])->name('index');

    Route::put('/house/{id}', [CMSController::class, 'updateHouse'])->name('house.update');
    Route::post('/settings', [CMSController::class, 'updateSettings'])->name('settings.update');
    Route::post('/house', [CMSController::class, 'storeHouse'])->name('house.store');
});

