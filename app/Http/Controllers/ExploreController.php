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

    /**
     * Handle the incoming request.
     *
     * @param User $user
     * @return Application|Factory|View|Response
     */
    public function __invoke(User $user)
    {
        $users = User::find(1);

        $explored = $users->isFollowing($user);

        return view('qchan._explore', [
            'users' => $user::query()->paginate(10),
            'onlyUser' => $user::query()->count() === 1,
            'explored' => $explored,
            ]);
    }
}
