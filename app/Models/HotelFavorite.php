<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelFavorite extends Model
{
    use HasFactory;

    public $table = 'hotel_favorites';
    protected $fillable = ['user_id', 'hotel_id'];
}
