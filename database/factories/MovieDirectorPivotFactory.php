<?php

namespace Database\Factories;

use App\Models\MovieDirectorPivot;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MovieDirectorPivot>
 */
class MovieDirectorPivotFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MovieDirectorPivot::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'movie_id' =>  random_int(1,200),
            'movie_director_id'=> random_int(1,100),
        ];
    }
}
