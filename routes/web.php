<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // Menggunakan Static Class (Lebih aman dari error Undefined Function)
    return Inertia::render('LandingPage'); 
});