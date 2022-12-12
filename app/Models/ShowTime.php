<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'theater_id',
        'theater_id',
        'movie_id',
        'time_start',
        'time_end',
        'theater_room_no'
    ];
}
