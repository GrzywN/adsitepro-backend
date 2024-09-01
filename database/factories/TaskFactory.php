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
            'estimated_minutes' => fake()->numberBetween(1, User::MAX_MONTHLY_CAPACITY_IN_MINUTES),
            'assigned_at' => now(),
            'completed_at' => null,
        ];
    }
}
