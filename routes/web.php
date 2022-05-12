<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeInvoke;

//for all users
Route::get('/', WelcomeInvoke::class)->name('welcome');

//laravel/ui
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//blog posts
Route::resource('/posts', PostController::class);
Route::post('/posts/comments/{id}', [CommentController::class, 'storeComment'])->name('comments.store');
