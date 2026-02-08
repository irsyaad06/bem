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

// 1. Halaman Pilihan Kementerian
Route::get('/kementerian', function () {
    return Inertia::render('Kementerian/ListKementerian');
})->name('list.kementerian');


Route::get('/kementerian/{id}', function ($id) {
    // Nanti ambil data detail aktivitas dari DB
    return Inertia::render('Kementerian/DetailKementerian', [
        'id' => $id
    ]);
})->name('kementerian.detail');

Route::get('/profile/{id}', function ($id) {
    // Nanti ambil data detail aktivitas dari DB
    return Inertia::render('ProfileAnggota', [
        'id' => $id
    ]);
})->name('profile.anggota');

// 2. Halaman Aktivitas Kerja (Berdasarkan ID Kementerian)
Route::get('/aktivitas-kerja', function () {
    // Nanti ambil data kementerian & aktivitas dari DB berdasarkan $id
    return Inertia::render('AktivitasKerja/AktivitasKerja');
})->name('aktivitas.kerja');

// 3. Halaman Detail Aktivitas (Berdasarkan ID Aktivitas)
Route::get('/aktivitas-kerja/detail/{id}', function ($id) {
    // Nanti ambil data detail aktivitas dari DB
    return Inertia::render('AktivitasKerja/DetailAktivitasKerja', [
        'id' => $id
    ]);
})->name('aktivitas.detail');

Route::get('/pimpinan', function () {
    return Inertia::render('Pimpinan');
})->name('pimpinan');

Route::get('/ormawa', function () {
    // Nanti ambil data kementerian & aktivitas dari DB berdasarkan $id
    return Inertia::render('Ormawa');
})->name('ormawa');












Route::get('/developer', function () {

    return Inertia::render('Developer');
})->name('developer');