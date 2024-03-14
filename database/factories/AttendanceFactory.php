<?php

namespace Database\Factories;

use App\Models\Attendance;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attendance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'license_plate' => $this->faker->unique()->regexify('[A-Z]{1} \d{3} [A-Z]{3}'),
            'event_id' => mt_rand(1, 20), // Assuming you have 20 events
            'owner_name' => $this->faker->name,
            'entry_hour' => $this->faker->time(),
        ];
    }
}
