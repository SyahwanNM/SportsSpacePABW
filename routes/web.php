<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [LandingPageController::class, 'index'])->name('landing');

// Authentication Routes - Hanya bisa diakses oleh guest (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [WebAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [WebAuthController::class, 'login']);
    Route::get('/register', [WebAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [WebAuthController::class, 'register']);
});

// Logout Route
Route::post('/logout', [WebAuthController::class, 'logout'])->name('logout')->middleware('auth');

// Protected Routes - Semua route di bawah ini memerlukan autentikasi
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // About Us dan FAQ
    Route::get('/about-us', function () {
        return view('aboutUs');
    })->name('aboutus');
    
    Route::get('/faq', function () {
        return view('FAQ');
    })->name('faq');
});

require __DIR__.'/auth.php';
