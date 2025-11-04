<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/event', function () {
    return view('event');
})->middleware(['auth', 'verified'])->name('event');

Route::get('/pinjam', [AdminController::class, 'showBooks'])
    ->middleware(['auth', 'verified'])
    ->name('pinjam');

Route::post('/pinjam/{id}', [AdminController::class, 'pinjamBuku'])
    ->middleware(['auth', 'verified'])
    ->name('pinjam.buku');

Route::get('/riwayat', [AdminController::class, 'riwayat'])
    ->middleware(['auth', 'verified'])
    ->name('riwayat');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('admin', AdminController::class);
});

require __DIR__.'/auth.php';
