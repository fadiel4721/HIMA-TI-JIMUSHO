<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard');
})->name('dashboard');

Route::get('/mahasiswa', function () {
    return view('pages.mahasiswa');
})->name('mahasiswa');

Route::get('/prodi', function () {
    return view('pages.prodi');
})->name('prodi');

Route::get('/keahlian', function () {
    return view('pages.keahlian');
})->name('keahlian');

Route::get('/kompetensi', function () {
    return view('pages.kompetensi');
})->name('kompetensi');

