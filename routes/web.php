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

// Halaman List (Daftar Program)
Route::get('/program-kerja', function () {
    return Inertia::render('ProgramKerja/ProgramKerja'); // Pastikan nama file Vue-nya: ProgramKerja.vue
})->name('program.kerja');

// Halaman Detail (Dinamis menggunakan {id})
Route::get('/program-kerja/{id}', function ($id) {
    // $id ini nanti dipakai untuk mencari data di database (jika sudah connect DB)

    return Inertia::render('ProgramKerja/DetailProgramKerja', [
        'id' => $id, // Mengirim ID ke halaman Vue agar bisa diolah
        // Nanti disini tempat kirim data detail program dari database
    ]);
})->name('program.detail');
