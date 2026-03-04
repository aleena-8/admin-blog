<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});

// Dashboard - all logged in users
Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes - all logged in users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin-only routes
Route::middleware(['auth', 'admin'])->group(function () {
    // Category management
    Route::resource('categories', CategoryController::class);

    // Optional: View all posts by all users
    Route::get('users-posts', [PostController::class, 'allUsersPosts'])->name('users.posts');
});

// Regular user routes (all logged-in users)
Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class)->except(['show']); // create, edit, update, delete posts
    Route::get('posts', [PostController::class, 'index'])->name('posts.index'); // view posts
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create'); // add post
});

require __DIR__.'/auth.php';