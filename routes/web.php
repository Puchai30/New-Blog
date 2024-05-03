<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;

Route::get('/', function () {
    return view('blogs',[
        'blogs' => Blog::all()
    ]);
});

Route::get('/blog/{id} ', function (Blog $id) {
    return view('blog',[
        'blogeer' => $id
    ]);
})->where('blogeer','[A-z\0-9\-_]+');

// Route::get('/blog/{id} ', function ($id) {
//     return view('blog',[
//         'blogeer' => Blog::findorFail($id)
//     ]);
// })->where('blogeer','[A-z\0-9\-_]+');
