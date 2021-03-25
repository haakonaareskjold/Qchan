<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(User $user)
    {

        return view('profiles.show', [
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
        $this->authorize('edit', $user);

        #TODO implement password change in another method and view

        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:70'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
            'background' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:102400'],
            'description' => ['nullable', 'string', 'max:70'],
            'username' => ['required', 'string', 'max:20', 'min:5', 'alpha_dash', Rule::unique('users')->ignore($user)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
        ]);

        if (request('avatar')) {
            $path = $attributes['avatar'] = Storage::putFileAs(
                'avatars',
                request('avatar'),
                $user->username
            );
            if (env('FILESYSTEM_DRIVER') === 's3') {
                Storage::disk('s3')->setVisibility($path, 'public');
            }
        }

        if (request('background')) {
            $path = $attributes['background'] = Storage::putFileAs(
                'backgrounds',
                request('background'),
                $request->user()->username
            );
            if (env('FILESYSTEM_DRIVER') === 's3') {
                Storage::disk('s3')->setVisibility($path, 'public');
            }
        }

        $user->update($attributes);

        return redirect($user->path());
    }

    public function showDestroy(User $user)
    {
        $this->authorize('edit', $user);

        return view('profiles.delete.show', compact('user'));
    }

    public function destroy(User $user)
    {
        try {
            $this->authorize('edit', $user);
            if (!isAdmin()) {
                auth()->logout();
            }
            if (env('FILESYSTEM_DRIVER') === 's3') {
                Storage::disk('s3')->delete("backgrounds/{$user->username}");
                Storage::disk('s3')->delete("avatars/{$user->username}");
            }
            $user->delete();
        } catch (AuthorizationException $e) {
        }

        return redirect(route('main'));
    }
}
