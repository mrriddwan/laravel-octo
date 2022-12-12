<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieDirector extends Model
{
    use HasFactory;

    protected $fillable = [
        'director_name',
    ];

    public function movie()
    {
        return $this->belongsToMany(Movie::class, 'movie_director_pivots');
    }
}
