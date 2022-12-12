<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoviePerformer extends Model
{
    use HasFactory;

    protected $fillable = [
        'performer_name',
    ];

    public function movie()
    {
        return $this->belongsToMany(Movie::class, 'movie_performer_pivots');
    }
}
