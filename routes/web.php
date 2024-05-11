<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;
use App\Models\Comment;
use App\Models\User;

Route::get('/', [BlogController::class, 'index']);
Route::get('/blog/{blog:slug}', [BlogController::class, 'show']);

Route::post('/blog/{blog:slug}/comments', [CommentController::class, 'store']);

Route::get('/register ', [AuthController::class, 'create'])->middleware('guest');
Route::post('/register ', [AuthController::class, 'store'])->middleware('guest');
Route::post('/logout ', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/login ', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login ', [AuthController::class, 'postLogin'])->middleware('guest');

Route::post('/blog/{blog:slug}/subscribe', [SubscribeController::class, 'subscriptionHandler']);

Route::middleware('can:admin')->group(function () {
    Route::get('/admin/blogs', [AdminBlogController::class, 'index'])->middleware('can:admin');
    Route::get('/admin/blogs/create', [AdminBlogController::class, 'create'])->middleware('can:admin');
    Route::post('/admin/blogs/store', [AdminBlogController::class, 'store'])->middleware('can:admin');
    Route::delete('/admin/blogs/{blog:slug}/delete', [AdminBlogController::class, 'destory'])->middleware('can:admin');
    Route::get('/admin/blogs/{blog:slug}/edit', [AdminBlogController::class, 'edit'])->middleware('can:admin');
    Route::patch('/admin/blogs/{blog:slug}/update', [AdminBlogController::class, 'update'])->middleware('can:admin');
});
