<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function subscriptionHandler(Blog $blog)
    {
        if (User::find(auth()->id())->isSubsribed($blog)) {
            $blog->unSubsribe();
        } else {
            $blog->Subsribe();
        }
        return redirect('/blog/' .$blog->slug);
    }
}
