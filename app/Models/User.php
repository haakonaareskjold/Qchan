<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable, UserFollowable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'avatar',
        'background',
        'description',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
        $default = 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&color=7F9CF5&background=EBF4FF';

        if(Storage::disk('spaces')->exists($value)) {
           return asset( Storage::disk('spaces')->url($value));
        } else {
            return asset( $default);
        }
    }

    public function getBackgroundAttribute($value)
    {
        $default = 'background.jpg';

        if(Storage::disk('spaces')->exists($value)) {
            return asset( Storage::disk('spaces')->url($value));
        } else {
            return asset( $default);
        }
    }


    public function path($append = '')
    {
        $path = route('profiles.show', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }

    public function posts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Post::class)
            ->latest();
    }

    public function likes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function timeline()
    {
        $ids = $this->follows()->pluck('id');
        $ids->push($this->id);

        return Post::query()->whereIn('user_id', $ids)
            ->orWhere('user_id', $this->id)
            ->withLikes()
            ->latest()
            ->paginate(6);
    }
}
