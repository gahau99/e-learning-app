<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KomentarController;

Route::view('/', 'welcome');

// Route tampilan dashboard
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Route tampilan profile
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Route untuk menyimpan komentar
Route::post('/komentar', [KomentarController::class, 'store'])
    ->middleware(['auth']) // Hanya user login yang bisa komentar
    ->name('komentar.store');

// Route utama diarahkan ke Livewire welcome
Route::get('/', function () {
    return view('welcome.welcome');
});
// Route auth Laravel Breeze/Fortify/etc
require __DIR__.'/auth.php';

    