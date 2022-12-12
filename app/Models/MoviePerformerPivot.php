<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoviePerformerPivot extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'movie_performer_id',
    ];
}
