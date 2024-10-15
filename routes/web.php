<?php

use App\Http\Controllers\KeahlianController;
use App\Http\Controllers\KompetensiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Models\Kompetensi;
use Illuminate\Support\Facades\Route;

// Mahasiswa
Route::get('/', [MahasiswaController::class, 'dashboard'])->name('dashboard');
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::put('/mahasiswa/update/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');

// Prodi
Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi');
Route::post('/prodi/store', [ProdiController::class, 'store'])->name('prodi.store');
Route::get('/prodi/edit/{id}', [ProdiController::class, 'edit'])->name('prodi.edit');
Route::put('/prodi/update/{id}', [ProdiController::class, 'update'])->name('prodi.update');

// Kompetensi 
Route::get('/kompetensi', [KompetensiController::class, 'index'])->name('kompetensi');
Route::get('/kompetensi/create', [KompetensiController::class, 'create'])->name('kompetensi.create');
Route::post('/kompetensi/store', [KompetensiController::class, 'store'])->name('kompetensi.store');
// Route::get('/kompetensi/edit/{id}', [KompetensiController::class, 'edit'])->name('kompetensi.edit');
// Route::put('/kompetensi/update/{id}', [KompetensiController::class, 'update'])->name('kompetensi.update');

// Keahlian
Route::get('/keahlian', [KeahlianController::class, 'index'])->name('keahlian');
Route::post('/keahlian/store', [KeahlianController::class, 'store'])->name('keahlian.store');
Route::get('/keahlian/edit/{id}', [KeahlianController::class, 'edit'])->name('keahlian.edit');
Route::put('/keahlian/update/{id}', [KeahlianController::class, 'update'])->name('keahlian.update');



