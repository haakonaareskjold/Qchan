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
            'user' => $user,
            'posts' => $user
                ->posts()
                ->paginate(5),
        ]);
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
            'name' => ['required', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
            'username' => ['required', 'string', 'max:16', 'min:5', 'alpha_dash', Rule::unique('users')->ignore($user)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['required', 'string', 'min:6', 'max:255', 'confirmed'],
        ]);


        $attributes['password'] =  Hash::make($attributes['password']);

        if(request('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($attributes);

        return redirect($user->path());
    }
}
