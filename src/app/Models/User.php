<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Tweet;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function avatar() {
        return 'https://www.gravatar.com/avatar/' . md5($this->email) . '?d=mp';
    }

    public function tweets() {
        return $this->hasMany(Tweet::class);
    }

    public function hasLiked(Tweet $tweet) {
        return $this->likes->contains('tweet_id', $tweet->id);
    }

    public function following() {
        return $this->belongsToMany(
            User::class, 'followers', 'user_id', 'following_id'
        );
    }

    public function followers() {
        return $this->belongsToMany(
            User::class, 'followers', 'following_id', 'user_id'
        );
    }

    public function tweetsFromFollowing() {
        return $this->hasManyThrough(
            Tweet::class, Follower::class, 'user_id', 'user_id', 'id', 'following_id'
        );
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }
}
