<?php

namespace Database\Factories;

use App\Models\MovieLanguagePivot;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MovieLanguagePivot>
 */
class MovieLanguagePivotFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MovieLanguagePivot::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'movie_id' =>  random_int(1,200),
            'movie_language_id'=> random_int(1,30),
        ];
    }
}
