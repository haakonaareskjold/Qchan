<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExploreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function __invoke(User $user)
    {

        return view('qchan._explore', [
            'users' => $user::query()->paginate(10),
            'onlyUser' => $user::query()->count() === 1,
            'following' => current_user()->follows()->get()
            ]);
    }
}
