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
     * @param $id
     * @return Application|Factory|View|Response
     */
    public function __invoke(User $user)
    {
        $data = DB::table('follows')->pluck('following_user_id')->all();

        if (!empty($data)) {
            foreach ($data as $int) {
                $follower = \App\Models\User::find($int);
            }

            $explored = $follower->isFollowedBy(current_user());
        } else {
            $explored = '';
        }

        return view('qchan._explore', [
            'users' => $user::query()->paginate(10),
            'onlyUser' => $user::query()->count() === 1,
            'explored' => $explored,
            ]);
    }
}
