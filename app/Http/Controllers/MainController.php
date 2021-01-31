<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function __invoke()
    {
        if (auth()->check()) {
            return redirect(route('posts.index'));
        } else {
            return view('components.main');
        }
    }
}
