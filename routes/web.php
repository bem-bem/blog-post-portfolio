<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicUsersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeInvoke;

//for all users

Route::get('/', [PublicUsersController::class, 'index'])->name('welcome');
Route::get('/public/posts/{id}', [PublicUsersController::class, 'show'])->name('public_users.show');

//laravel/ui
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//blog posts
Route::resource('/posts', PostController::class)->except(['show'])->middleware('auth');
Route::post('/posts/comments/{id}', [CommentController::class, 'storeComment'])->name('comments.store')->middleware('auth');

//users
Route::resource('/users', UserController::class);
