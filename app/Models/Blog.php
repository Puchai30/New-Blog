<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'intro', 'body','category_id', 'user_id','thumbnail'];

    protected $with = ['category', 'author',];

    public function scopeFilter($blog_query, $filter) // Blog::latest()->filter()
    {

        $blog_query->when($filter['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' .  $search . '%')
                    ->orWhere('body', 'LIKE', '%' .  $search . '%');

            });

        });

        $blog_query->when($filter['category'] ?? false, function ($query, $slug) {
            $query->whereHas('category',function ($query) use ($slug) {
                $query->where('slug', $slug);

            });
        });

        $blog_query->when($filter['username'] ?? false, function ($query, $username) {
            $query->whereHas('author',function ($query) use ($username) {
                $query->where('username', $username);
            });
        });

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function subscribers()
    {
        return $this->belongsToMany(User::class, 'blog_user');
    }

    public function unSubsribe()
    {
        $this->subscribers()->detach(auth()->id());
    }

    public function subsribe()
    {
        $this->subscribers()->attach(auth()->id());
    }
}
