<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_title',
        'movie_release_date',
        'movie_length',
        'movie_desc',
        'mpaa_rating',
        'movie_director',
        'movie_language',
        'overall_rating',
    ];

    public function genre()
    {
        return $this->belongsToMany(MovieGenre::class, 'movie_genre_pivots');
    }

    public function director()
    {
        return $this->belongsToMany(MovieDirector::class, 'movie_director_pivots');
    }

    public function language()
    {
        return $this->belongsToMany(MovieLanguage::class, 'movie_language_pivots');
    }

    public function performer()
    {
        return $this->belongsToMany(MovieGenre::class, 'movie_performer_pivots');
    }
}
