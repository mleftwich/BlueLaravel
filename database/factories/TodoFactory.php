<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /* Use Faker to populate todos table with dummy data */
        return [
            'name' => fake()->numerify('Example Todo ##'),
            'description' => fake()->sentence(),
            'due_date' => fake()->dateTime(),
            'is_complete' => 0,
        ];
    }
}
