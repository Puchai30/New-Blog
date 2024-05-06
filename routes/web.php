<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

Route::get('/', [BlogController::class, 'index']);

Route::get('/blog/{blog:slug} ', [BlogController::class, 'show']);

Route::get('/category/{category:slug}',function(Category $category){
    return view('blogs',[
        'blogs' => $category->blog,
        'categories' => Category::all(),
        'currentCategory' => $category
    ]);
});

Route::get('/user/{user:username}',function(User $user){
    return view('blogs',[
        'blogs' => $user->blog,
        'categories' => Category::all()
    ]);
});


