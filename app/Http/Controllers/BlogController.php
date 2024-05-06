<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs', [
            'blogs' => Blog::latest()->filter(request(['search']))->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blog', [
            'blogger' => $blog,
            'randomBlogs' => Blog::inRandomOrder()->take(3)->get()
        ]);
    }

    // protected function getBlogs()
    // {
    //     return Blog::latest()->filter()->get();
    //     // if (request('search')) {
    //     //     $blogs->where('title', 'LIKE', '%' . request('search') . '%')
    //     //         ->orWhere('body', 'LIKE', '%' . request('search') . '%');
    //     // }
    //     // return $blogs->get();

    // }
}
