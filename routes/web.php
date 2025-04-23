<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FieldController;

Route::get('/', [LandingPageController::class, 'index'])->name('landingpage');  // Display landing page

// Halaman login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route untuk menampilkan dashboard dan menambah postingan
Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard'); // Menampilkan semua postingan
Route::post('/posts', [PostController::class, 'store'])->name('storePost'); // Menyimpan postingan baru
// Route untuk menampilkan form edit postingan
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

// Route untuk memperbarui postingan
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

// Route untuk menghapus postingan
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// Route logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/FAQ', function () {
    return view('FAQ');
})->name('faq');

Route::get('/aboutus', function () {
    return view('aboutUs');
})->name('aboutus');

Route::get('/login', function () {
    return view('auth/login');
})->name('login');

Route::get('/register', function () {
    return view('auth/register');
})->name('register');

Route::middleware(['web'])->group(function () {
    Route::get('/home', [FieldController::class, 'index'])->name('home');
    Route::get('/fields', [FieldController::class, 'index'])->name('fields.index');
    Route::get('/fields/create', [FieldController::class, 'create'])->name('fields.create');
    Route::post('/fields', [FieldController::class, 'store'])->name('fields.store');
    Route::get('/fields/{index}', [FieldController::class, 'show'])->name('fields.show');
    Route::get('/fields/{index}/edit', [FieldController::class, 'edit'])->name('fields.edit');
    Route::put('/fields/{index}', [FieldController::class, 'update'])->name('fields.update');
    Route::delete('/fields/{index}', [FieldController::class, 'destroy'])->name('fields.destroy');
})->name('fields');