<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    use HasFactory;
    public $table = 'images';

    protected $fillable = ['id', 'user_id', 'name', 'path', 'extension'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
