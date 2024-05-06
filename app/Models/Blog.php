<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','into','body'];

    protected $with = ['category', 'author'];

     public function scopeFilter($blogs, $filter) // Blog::latest()->filter()
     {
        $blogs->when($filter['search'] ?? false, function ($query, $search){
            $query->where('title', 'LIKE', '%' .  $search . '%')
                    ->orWhere('body', 'LIKE', '%' .  $search . '%');
        });
        return $blogs;
     }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}

