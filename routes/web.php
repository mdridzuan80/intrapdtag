<?php

use App\Http\Controllers\AcaraController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Livewire\DaftarAcara;
use App\Livewire\DaftarAcaraEdit;
use App\Livewire\InfoAcara;
use App\Livewire\ListAcara;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Daftar acara routes
    Route::get('/acara', ListAcara::class)->name('acara.list');
    Route::get('/acara/create', DaftarAcara::class)->name('acara.create');
    Route::get('/acara/{id}', InfoAcara::class)->name('acara.show');
    Route::get('/acara/{id}/edit', DaftarAcaraEdit::class)->name('acara.edit');
});

Route::get('/acara/hadir/{slug}', [AcaraController::class, 'hadir'])->name('acara.kehadiran.daftar');
Route::get('/acara/hadir/status/{id}', [AcaraController::class, 'status'])->name('acara.kehadiran.status');


require __DIR__.'/auth.php';
