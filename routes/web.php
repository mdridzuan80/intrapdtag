<?php

use App\Http\Controllers\AcaraController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Livewire\DaftarAcara;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Daftar acara routes
    Route::get('/acara', [AcaraController::class, 'listAcara'])->name('acara.list');
    Route::get('/acara/create', [AcaraController::class, 'create']);
    Route::get('/acara/create', DaftarAcara::class)->name('acara.create');
});

require __DIR__.'/auth.php';
