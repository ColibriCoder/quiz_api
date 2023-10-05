<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\QuizQuestion;
use App\Models\QuizAnswer;
use App\Models\QuizResult;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuizAnswer>
 */
class QuizAnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quiz_question_id' => QuizQuestion::all()->random()->id,
			'title' => fake()->sentence(1)
        ];
    }

	// public function configure(): static
    // {
    //     return $this->afterCreating(function (QuizAnswer $quizAnswer) {
	// 		// dd($quizAnswer);
	// 		$quizAnswer->results()->sync([QuizResult::all()->random()->id]);
    //     });
    // }
}
