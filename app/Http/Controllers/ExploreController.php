<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

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
        return view('qchan._explore', ['users' => $user::paginate(10)]);
    }
}
