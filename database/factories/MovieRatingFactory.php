<?php

namespace Database\Factories;

use App\Models\MovieRating;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MovieRating>
 */
class MovieRatingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MovieRating::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'movie_id' =>  random_int(1,100),
            'user_id'=> random_int(1,10),
            'rating'=> random_int(1,10),
            'rating_description'=> $this->faker->realText($maxNbChars = 30),
        ];
    }
}
