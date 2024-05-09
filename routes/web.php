<?php

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






