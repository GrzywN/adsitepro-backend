<?php

namespace Database\Factories;

use App\Models\TaskCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    const PROBABILITY_OF_COMPLETION_IN_PERCENTS = 10;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'category_id' => TaskCategory::factory(),
            'owner_id' => User::factory(),
            'assigned_user_id' => User::factory(),
            'due_date' => fake()->dateTimeBetween('now', '+1 year'),
            'completed_at' => fake()->boolean(self::PROBABILITY_OF_COMPLETION_IN_PERCENTS)
                                ? fake()->dateTimeBetween('-1 year', 'now')
                                : null,
        ];
    }
}
