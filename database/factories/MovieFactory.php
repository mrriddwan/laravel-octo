<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\MovieDatabase;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MovieDatabase>
 */
class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'movie_title' =>  $this->faker->realText($maxNbChars = 20),
            'movie_release_date'=> $this->faker->dateTimeBetween('-1 week', '+10 years'),
            'movie_length'=> random_int(1, 100),
            'movie_desc'=> $this->faker->realText($maxNbChars = 50),
            'mpaa_rating' => 'PG-13',
            'overall_rating'=> random_int(1,10)
        ];
    }
}
