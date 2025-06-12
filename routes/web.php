<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\RatingLapanganController;
use App\Http\Controllers\KomunitasController;
Use App\Http\Controllers\SportsGroupController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('/', [LandingController::class, 'landingpage'])->name('landingpage');

Route::get('/aboutus', function () {
    return view('aboutUs');
})->name('aboutus');

Route::get('/faq', function () {
    return view('FAQ');
})->name('faq');

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Post routes
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    // User routes
    Route::get('/lapangan', [LapanganController::class, 'index'])->name('lapangan.index');
    Route::get('/lapangan/{lapangan}', [LapanganController::class, 'show'])->name('lapangan.show');
    Route::post('/lapangan/{lapangan}/review', [RatingLapanganController::class, 'store'])->name('lapangan.review.store');
    //komunitas routes
    Route::get('/komunitas', [KomunitasController::class, 'index'])->name('komunitas.index');
    Route::get('/komunitas/create', [KomunitasController::class, 'create'])->name('komunitas.create');
    Route::post('/komunitas', [KomunitasController::class, 'store'])->name('komunitas.store');
    Route::get('/komunitas/{komunitas}', [KomunitasController::class, 'show'])->name('komunitas.show');
    Route::get('/komunitas/{komunitas}/edit', [KomunitasController::class, 'edit'])->name('komunitas.edit');
    Route::put('/komunitas/{komunitas}', [KomunitasController::class, 'update'])->name('komunitas.update');
    // Sports Group routes
    Route::get('/sports-group', [SportsGroupController::class, 'index'])->name('sports-group.index');
    Route::get('/sports-group/create', [SportsGroupController::class, 'create'])->name('sports-group.create');
    Route::post('/sports-group', [SportsGroupController::class, 'store'])->name('sports-group.store');
    Route::get('/sports-group/{id}', [SportsGroupController::class, 'show'])->name('sports-group.show');
    Route::get('/sports-group/{group}/edit', [SportsGroupController::class, 'edit'])->name('sports-group.edit');
    Route::put('/sports-group/{group}', [SportsGroupController::class, 'update'])->name('sports-group.update');
    // Route to join sports group
    Route::post('/sports-group/{id}/join', [SportsGroupController::class, 'join'])->name('sports-group.join');
});

// Admin routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('lapangan', App\Http\Controllers\Admin\LapanganController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
});

require __DIR__.'/auth.php';
