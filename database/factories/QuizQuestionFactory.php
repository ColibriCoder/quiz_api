<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Quiz;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuizQuestion>
 */
class QuizQuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quiz_id' => Quiz::all()->random()->id,
			'number' => fake()->randomDigit(),
			'title' => fake()->sentence(1)
        ];
    }
}
