<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {
        return view('qchan._index', [
            'posts' => auth()
                ->user()
                ->timeline()
        ], compact('user'));
    }

    public function store()
    {
        $attributes = request()->validate(['body' => 'required|max:255']);

        Post::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);

        return redirect()->back();
    }

    public function destroy(Post $post)
    {
        if ($post->user_id == Auth::user()->id) {
            $post->delete();
        }
        return back();
    }
}
