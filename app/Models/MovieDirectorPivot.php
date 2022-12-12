<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieDirectorPivot extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'movie_director_id',
    ];
}
