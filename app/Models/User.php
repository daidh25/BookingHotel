<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable as AccessAuthorizable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements Authorizable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, AccessAuthorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password',
        // 'remember_token',
    ];

    protected $visible = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userInfo()
    {
        return $this->hasOne(UserInfo::class);
    }

    public function avatar()
    {
        return $this->hasOne(Avatar::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function hotels()
    {
        return $this->hasMany(Hotel::class, 'owner_id');
    }

    public function favoritesHotels()
    {
        return $this->belongsToMany(Hotel::class, 'hotel_favorites', 'user_id', 'hotel_id');
    }
}
