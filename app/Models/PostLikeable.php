<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Builder;

trait PostLikeable
{
    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select post_id,
                    sum(case when liked then 1 else 0 end) as likes,
                    sum(case when not liked then 1 else 0 end) as dislikes from likes group by post_id',
            'likes',
            'likes.post_id',
            'posts.id'
        );
    }


    public function isDislikedBy(User $user): bool
    {
        return (bool)$user->likes
            ->where('post_id', $this->id)
            ->where('liked', false)
            ->count();
    }

    public function isLikedBy(User $user): bool
    {
        return (bool)$user->likes
            ->where('post_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()
            ->updateOrCreate([
                'user_id' => $user ? $user->id : auth()->id(),
            ], [
                'liked' => $liked
            ]);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function unlike(?User $user = null)
    {
        $this->likes->where('user_id', $user->id ?? auth()->id())->first()->delete();
    }
}
