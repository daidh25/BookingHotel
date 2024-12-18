<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $table = 'users_info';
    protected $fillable = ['first_name', 'last_name', 'dob', "address", 'user_id', 'address', 'phone_number'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullnameAttribute()
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }
}
