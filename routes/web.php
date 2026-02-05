<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // Menggunakan Static Class (Lebih aman dari error Undefined Function)
    return Inertia::render('LandingPage');
});

Route::get('/ruang-asa', function () {
    // 'RuangAsaPage' harus sesuai dengan nama file di folder Pages (tanpa .vue)
    return Inertia::render('RuangAsaPage');
})->name('ruang.asa');
