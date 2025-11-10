<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/event', [EventController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('event');

Route::get('/pinjam', [AdminController::class, 'showBooks'])
    ->middleware(['auth', 'verified'])
    ->name('pinjam');

Route::post('/pinjam/{id}', [AdminController::class, 'pinjamBuku'])
    ->middleware(['auth', 'verified'])
    ->name('pinjam.buku');

Route::get('/riwayat', [AdminController::class, 'riwayat'])
    ->middleware(['auth', 'role:user'])
    ->name('riwayat');

Route::get('/admin/riwayat', [AdminController::class, 'riwayatAdmin'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.riwayat');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/admin/event', [EventController::class, 'index'])->name('admin.event.index');
    Route::get('/admin/event/create', [EventController::class, 'create'])->name('admin.event.create');
    Route::post('/admin/event', [EventController::class, 'store'])->name('admin.event.store');
    Route::get('/admin/event/{id}/edit', [EventController::class, 'edit'])->name('admin.event.edit');
    Route::put('/admin/event/{id}', [EventController::class, 'update'])->name('admin.event.update');
    Route::delete('/admin/event/{id}', [EventController::class, 'destroy'])->name('admin.event.destroy');
    Route::resource('admin', AdminController::class);   
});

require __DIR__.'/auth.php';
