<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieLanguage extends Model
{
    use HasFactory;

    protected $fillable = [
        'language_name',
    ];

    public function movie()
    {
        return $this->belongsToMany(Movie::class, 'movie_language_pivots');
    }
}
