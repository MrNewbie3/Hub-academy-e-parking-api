<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_name' => $this->faker->sentence,
            'event_date' => $this->faker->dateTimeBetween('-1 month', '+1 month')->format('Y-m-d'),
            'event_start' => $this->faker->time(),
        ];
    }
}
