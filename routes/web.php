<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk menampilkan daftar posts
Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');

// Route untuk menampilkan form pembuatan post
Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');

// Route untuk menyimpan post baru
Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');

// Route untuk menampilkan form edit post
Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])->name('posts.edit');

// Route untuk memperbarui post yang sudah ada
Route::put('/posts/{post}', [PostsController::class, 'update'])->name('posts.update');

// Route untuk menghapus post
Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');
