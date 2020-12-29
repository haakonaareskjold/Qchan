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

    public function storeLike (Post $post)
    {
        $post->like(current_user());

        return back();
    }

    public function storeDislike(Post $post)
    {
        $post->dislike(current_user());

        return back();
    }


    public function destroy(Post $post): \Illuminate\Http\RedirectResponse
    {
        $post->unlike();

        return back();
    }
}
