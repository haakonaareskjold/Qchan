<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show (User $user)
    {

        return view('profiles.show',[
            'posts' => $user
                ->posts()
                ->withLikes()
                ->paginate(5),
        ], compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('edit', $user);

        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->middleware('can:edit,user');

        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:70'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
            'banner' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:102400'],
            'description' => ['nullable', 'string', 'max:70'],
            'username' => ['required', 'string', 'max:20', 'min:5', 'alpha_dash', Rule::unique('users')->ignore($user)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['required', 'string', 'min:8', 'max:2000', 'confirmed'],
        ]);


        $attributes['password'] =  Hash::make($attributes['password']);

        if(request('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        if(request('banner')) {
            $attributes['banner'] = request('banner')->store('banners');
        }

        $user->update($attributes);

        return redirect($user->path());
    }
}
