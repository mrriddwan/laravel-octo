<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieGenre extends Model
{
    use HasFactory;

    protected $fillable = [
        'genre_name',
    ];

    public function movie()
    {
        return $this->belongsToMany(Movie::class, 'movie_genre_pivots');
    }
}
