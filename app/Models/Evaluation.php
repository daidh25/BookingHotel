<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;
    public $table = 'evaluations';
    protected $fillable = ['user_id', 'hotel_id', 'point', 'feedback'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
