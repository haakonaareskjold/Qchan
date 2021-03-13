<?php

namespace App\Models;

use App\Notifications\FollowerReceived;
use Illuminate\Support\Facades\Notification;

trait UserFollowable
{
    // method to follow a user
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    // returns who current user follows
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id');
    }

    public function isFollowedBy(User $user)
    {
        return $this->followers()
            ->where('user_id', $user->id)
            ->exists();
    }



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
        if ($this->following($user)) {
            return $this->unfollow($user);
        }

        $user->notify(new FollowerReceived(current_user()));
        return $this->follow($user);
    }
}
