<?php

use App\Http\Controllers\Admin\CMSController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\LotingController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;


// Dit zorgt ervoor dat de startpagina direct je login-blade laadt
Route::get('/', function () {
    return view('login'); // Pas 'auth.login' aan naar de naam van jouw login blade-bestand
});
Route::get('/loting', function () {
    $houses = \App\Models\VacationHouse::all();
    return view('loting', ['houses' => $houses]);
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

Route::get('/account', function () {
    $activeInschrijving = \App\Models\Inschrijving::where('email', auth()->user()->email)->first();
    return view('account', compact('activeInschrijving'));
})->name('account')->middleware('auth');

// Temporary route to inspect database content
Route::get('/debug-db', function () {
    return response()->json([
        'inschrijving' => \App\Models\Inschrijving::all(),
        'loting' => \App\Models\Loting::all(),
        'inschrijfronde' => \App\Models\Inschrijfronde::all(),
    ]);
});

Route::get('/admin', [adminController::class, 'admin'])->name('admin');
Route::get('/admin/export-inschrijvingen', [adminController::class, 'exportInschrijvingen'])->name('admin.export.inschrijvingen');

Route::get('/admin/loting', [\App\Http\Controllers\AdminLotingController::class, 'index'])->name('admin.loting.index');

Route::prefix('admin/cms')->name('admin.cms.')->group(function () {
    Route::get('/', [CMSController::class, 'index'])->name('index');
    Route::put('/house/{id}', [CMSController::class, 'updateHouse'])->name('house.update');
    Route::post('/delete-image', [CMSController::class, 'deleteHouseImage'])->name('house.image.delete');
    Route::post('/delete-pdf', [CMSController::class, 'deleteHousePdf'])->name('house.pdf.delete');
    Route::post('/delete-house', [CMSController::class, 'deleteHouse'])->name('house.delete');
    Route::post('/delete-gallery-photo', [CMSController::class, 'deleteGalleryPhoto'])->name('house.gallery.delete');
    Route::post('/settings', [CMSController::class, 'updateSettings'])->name('settings.update');
    Route::post('/house', [CMSController::class, 'storeHouse'])->name('house.store');
});

// Route om de tabel met alle gebruikers te zien (Read)
Route::get('/gebruikers', [UserController::class, 'index'])->name('users.index');

// Route om het bewerkscherm te openen (Update - pagina)
Route::get('/gebruikers/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

// Route om de bewerkte gegevens op te slaan (Update - actie)
Route::put('/gebruikers/{user}', [UserController::class, 'update'])->name('users.update');

// Route om de admin-rol om te draaien (Update - admin actie)
Route::patch('/gebruikers/{user}/toggle-admin', [UserController::class, 'toggleAdmin'])->name('users.toggleAdmin');

// Route om een gebruiker te verwijderen (Delete)
Route::delete('/gebruikers/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/gebruikers', [UserController::class, 'index'])->name('users.index');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [adminController::class, 'index'])->name('admin');