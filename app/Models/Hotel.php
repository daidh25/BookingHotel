<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'city',
        'country',
        'description',
        'check_in_date',
        'price',
        'num_guest',
        'image1',
        'image2',
        'image3',
        'owner_id',
        'admin_accepted',
        'deleted_at'
    ];

    public function customers()
    {
        return $this->belongsToMany(User::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function favoriteUsers()
    {
        return $this->belongsToMany(User::class, 'hotel_favorites', 'hotel_id', 'user_id');
    }
}
