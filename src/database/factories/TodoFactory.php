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
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(3),
            'user_id' => fake()->randomNumber(1, 30), // Assuming you have 10 users
            'category_id' => fake()->randomNumber(1, 30), // Assuming you have 10 categories
            'status' => fake()->randomElement(['pending','in_progress', 'completed']),
            'priority'=> fake()->randomElement(['low','medium', 'high']),
            'due_date'=> fake()->dateTimeBetween('-1 Month', '+1 month'),
            'completed_at' => fake()->dateTimeBetween('-1 Month', 'now'),
            'is_starred'=> fake()->boolean(10)
        ];
    }
}
