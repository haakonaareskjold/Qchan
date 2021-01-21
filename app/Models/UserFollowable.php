<?php


namespace App\Models;


use App\Notifications\FollowerReceived;
use Illuminate\Support\Facades\Notification;

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
        if ($this->following($user)) {
            return $this->unfollow($user);
        }

        $user->notify(new FollowerReceived(current_user()));
        return $this->follow($user);
    }
}
