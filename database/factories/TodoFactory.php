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
    public function definition()
    {
        return [
            'title' => fake()->sentence,
            'description' => fake()->text,
            'is_complete' => fake()->boolean
        ];
    }

    public function owner($id)
    {
        return $this->state(fn (array $attributes) => [
            'user_id' => $id,
        ]);
    }
}
