<?php

namespace App\Http\Controllers;


class MainController extends Controller
{
    public function __invoke()
    {
        if(auth()->check()) {
            return redirect(route('home'));
        } else {
            return view('components.main');
        }
    }
}
