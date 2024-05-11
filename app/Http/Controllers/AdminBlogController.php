<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Blog;
use App\Models\Category;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class AdminBlogController extends Controller
{

    public function index()
    {
        return view('admin.blogs.index', [
            'blogs' => Blog::latest()->paginate(4),
        ]);
    }

    public function create()
    {
        return view('admin.blogs.create', [
            'categories' => Category::all()
        ]);
    }

    public function store()
    {
        $path=request()->file('thumbnail')->store('thumbnails');
        $blog_data = request()->validate([
            'title' => ['required'],
            'slug' => ['required', Rule::unique('blogs', 'slug')],
            'intro' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $blog_data['user_id'] = auth()->id();
        $blog_data['thumbnail'] = $path;
        Blog::create($blog_data);

        return redirect('/');
    }

    public function destory(Blog $blog)
    {
        $blog->delete();
        return back();
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', [
            'blog' => $blog,
            'categories' => Category::all()
        ]);
    }

    public Function update(Blog $blog)
    {

        $blog_data = request()->validate([
            'title' => ['required'],
            'slug' => ['required', Rule::unique('blogs', 'slug')->ignore($blog->id)],
            'intro' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $blog_data['user_id'] = auth()->id();
        $blog_data['thumbnail'] = request()->file('thumbnail') ?
            request()->file('thumbnail')->store('thumbnails'): $blog->thumbnail;

        $blog->update($blog_data);

        return redirect('/');
    }
}
