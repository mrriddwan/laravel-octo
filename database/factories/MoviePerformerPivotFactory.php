<?php

namespace Database\Factories;

use App\Models\MoviePerformerPivot;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MoviePerformerPivot>
 */
class MoviePerformerPivotFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MoviePerformerPivot::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'movie_id' =>  random_int(1,200),
            'movie_performer_id'=> random_int(1,200),
        ];
    }
}
