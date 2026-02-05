<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // Menggunakan Static Class (Lebih aman dari error Undefined Function)
    return Inertia::render('LandingPage');
});

Route::get('/ruang-asa', function () {
    
    return Inertia::render('RuangAsaPage');
})->name('ruang.asa');

Route::get('/kontak', function () {
    
    return Inertia::render('Kontak');
})->name('kontak');

Route::get('/struktur', function () {
    
    return Inertia::render('Struktur');
})->name('struktur');
