<?php


namespace App\Models;


use App\Notifications\FollowerReceived;

trait UserFollowable
{
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    // returns pivot table for follows
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    // returns
    public function following(User $user)
    {

        return $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }


    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user)
    {
        $this->follows()->toggle($user);
        request()->user()->notify(new FollowerReceived($user));
    }
}
