<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use UserFollowable;

    public const ADMIN_TYPE = 'admin';
    public const DEFAULT_TYPE = 'default';

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
        'type',
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
        'last_online_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
        $default = 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF';

        return $this->fileSystemCheck($value, $default);
    }

    public function getBackgroundAttribute($value)
    {
        $default = 'background.jpg';

        return $this->fileSystemCheck($value, $default);
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

    /**
     * @param $value
     * @param string $default
     * @return string
     */
    public function fileSystemCheck($value, string $default): string
    {
        if (env('FILESYSTEM_DRIVER') === 's3') {
            if (Storage::disk('s3')->exists($value)) {
                return asset(Storage::disk('s3')->url($value));
            }

            return asset($default);
        }

        return asset($value ?: $default);
    }

    public function adminStatus()
    {
        return $this->type === self::ADMIN_TYPE;
    }
}
