<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;

Route::get('/', function () {
    $blogs = Blog::all();
    return view('blogs',[
        'blogs' => $blogs
    ]);
});

Route::get('/blog/{blog} ', function ($slug) {
    $blog  = Blog::find($slug);
    return view('blog',[
        'blogeer' => $blog
    ]);
})->where('blogeer','[A-z\0-9\-_]+');


