<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store (Post $post)
    {
        $post->like(current_user());

        return back();
    }

    public function destroy(Post $post)
    {
        $post->dislike(current_user());

        return back();
    }
}
