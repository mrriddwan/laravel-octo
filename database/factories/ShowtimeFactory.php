<?php

namespace Database\Factories;

use App\Models\ShowTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ShowtimeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShowTime::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'theater_id' =>  random_int(1,20),
            'movie_id'=> random_int(1,100),
            'time_start'=> $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'time_end'=> $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'theater_room_no'=> random_int(1,100),
        ];
    }
}
