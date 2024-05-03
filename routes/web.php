<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('blogs',[
        'blogs' => Blog::all()
    ]);
});

Route::get('/blog/{blog:slug} ', function (Blog $blog) {
    return view('blog',[
        'blogger' => $blog
    ]);
})->where('blogger','[A-z\0-9\-_]+');

// Route::get('/blog/{id} ', function ($id) {
//     return view('blog',[
//         'blogeer' => Blog::findorFail($id)
//     ]);
// })->where('blogeer','[A-z\0-9\-_]+');

Route::get('/category/{category:slug}',function(Category $category){
    return view('blogs',[
        'blogs' => $category->blog
    ]);

});
