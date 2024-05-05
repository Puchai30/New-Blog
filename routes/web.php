<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

Route::get('/', function () {
    // DB::listen(function($query){
    //     logger($query->sql);
    // });
    return view('blogs',[
        'blogs' => Blog::latest()->get(),
        'categories' => Category::all()
    ]);
});

Route::get('/blog/{blog:slug} ', function (Blog $blog) {
    return view('blog',[
        'blogger' => $blog,
        'randomBlogs' => Blog::inRandomOrder()->take(3)->get()
    ]);
})->where('blogger','[A-z\0-9\-_]+');

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


