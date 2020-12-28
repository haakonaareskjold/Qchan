<?php

namespace App\Http\Controllers;

use App\Models\User;

class FollowsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(User $user)
    {
        auth()
            ->user()
            ->toggleFollow($user);
        return back();
    }
}
