<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\QuizResult;
use App\Models\QuizQuestion;
use App\Models\QuizAnswer;
use App\Models\Media;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
		$favoriteTypeOfMusicQuizImage = Media::factory()->create([
			'path' => 'storage/mohammad-metri-1oKxSKSOowE-unsplash-min',
			'extention' => 'jpg'
		]);

		$quiz = Quiz::factory()->create([
			'title' => 'Whats your favorite type of music?',
			'description' => 'Everyone has their music taste. Today, we’re gonna figure out what type of music is your favorite! We would like you to answer a few questions that would help us to figure it out.',
			'media_id' => $favoriteTypeOfMusicQuizImage->id
		]);

		$classicalMusicImage = Media::factory()->create([
			'path' => 'storage/manuel-nageli-NsgsQjHA1mM-unsplash-min',
			'extention' => 'jpg'
		]);

		$rockMusicImage = Media::factory()->create([
			'path' => 'storage/sebastian-ervi-uCZVEo8iT9Q-unsplash-min',
			'extention' => 'jpg'
		]);

		$RAPMusicImage = Media::factory()->create([
			'path' => 'storage/gordon-cowie-qQzw8jPvip8-unsplash-min',
			'extention' => 'jpg'
		]);

		$ElectronicMusicImage = Media::factory()->create([
			'path' => 'storage/michael-benz-SP6vKjbUic0-unsplash',
			'extention' => 'jpg'
		]);

		$PopMusicImage = Media::factory()->create([
			'path' => 'storage/aditya-chinchure-ZhQCZjr9fHo-unsplash-min',
			'extention' => 'jpg'
		]);

		QuizResult::factory()->count(5)->sequence(
			[
				'quiz_id' => $quiz->id,
				'title' => 'Classical',
				'description' => 'You have a very mature taste of music.',
				'media_id' => $classicalMusicImage->id
			],
			[
				'quiz_id' => $quiz->id,
				'title' => 'Rock',
				'description' => 'You have a free soul and like to enjoy it.',
				'media_id' => $rockMusicImage->id
			],
			[
				'quiz_id' => $quiz->id,
				'title' => 'Rap',
				'description' => 'You like to enjoy a poetry of the streets.',
				'media_id' => $RAPMusicImage->id
			],
			[
				'quiz_id' => $quiz->id,
				'title' => 'Electronic',
				'description' => 'You really like to party!',
				'media_id' => $ElectronicMusicImage->id
			],
			[
				'quiz_id' => $quiz->id,
				'title' => 'POP',
				'description' => 'You listen to a top tier artists!',
				'media_id' => $PopMusicImage->id
			]
		)->create();

		// dd($quiz->id);
		$quizQuestion = QuizQuestion::factory()->create([
			'quiz_id' => $quiz->id,
			'number' => 1,
			'title' => 'Do you like to dance in a shower?'
		]);

		QuizAnswer::factory()->count(3)->sequence(
			[
				'quiz_question_id' => $quizQuestion->id,
				'title' => 'No, I do not.'
			],
			[
				
				'quiz_question_id' => $quizQuestion->id,
				'title' => 'Yes, I’m having a blast in there!'
			],
			[
				
				'quiz_question_id' => $quizQuestion->id,
				'title' => 'I just like to hum while showering.'
			]
		)->afterCreating(function (QuizAnswer $quizAnswer) {
			switch($quizAnswer->title) {
				case 'No, I do not.':
					$quizAnswer->results()->sync([QuizResult::where('title', '=', 'Classical')->first()->id]);

					break;
				case 'Yes, I’m having a blast in there!':
					$quizAnswer->results()->sync(QuizResult::whereIn('title', ['POP', 'Rock', 'Rap', 'Electronic'])->get()->pluck('id'));

					break;
				case 'I just like to hum while showering.':
					$quizAnswer->results()->sync([QuizResult::where('title', '=', 'POP')->first()->id]);

					break;
			}
        })->create();

		$quizQuestion2 = QuizQuestion::factory()->create([
			'quiz_id' => $quiz->id,
			'number' => 2,
			'title' => 'How do you usually enjoy the music?'
		]);

		QuizAnswer::factory()->count(3)->sequence(
			[
				'quiz_question_id' => $quizQuestion2->id,
				'title' => 'Through a high quality music system.'
			],
			[
				
				'quiz_question_id' => $quizQuestion2->id,
				'title' => 'Only with an earbuds.'
			],
			[
				
				'quiz_question_id' => $quizQuestion2->id,
				'title' => 'As loud as I can!'
			]
		)->afterCreating(function (QuizAnswer $quizAnswer) {
			switch($quizAnswer->title) {
				case 'Through a high quality music system.':
					$quizAnswer->results()->sync(QuizResult::whereIn('title', ['Rock', 'Electronic', 'Classical'])->get()->pluck('id'));

					break;
				case 'Only with an earbuds.':
					$quizAnswer->results()->sync([QuizResult::where('title', '=', 'POP')->first()->id]);

					break;
				case 'As loud as I can!':
					$quizAnswer->results()->sync(QuizResult::whereIn('title', ['Rock', 'Electronic'])->get()->pluck('id'));

					break;
			}
        })->create();

		$quizQuestion3 = QuizQuestion::factory()->create([
			'quiz_id' => $quiz->id,
			'number' => 3,
			'title' => 'What type of music events do you like'
		]);

		QuizAnswer::factory()->count(3)->sequence(
			[
				'quiz_question_id' => $quizQuestion3->id,
				'title' => 'Crowded. I like to blend in a crowd, see different face on every moment.'
			],
			[
				
				'quiz_question_id' => $quizQuestion3->id,
				'title' => 'With less people. Like in a bar, where it is comfy.'
			],
			[
				
				'quiz_question_id' => $quizQuestion3->id,
				'title' => 'In a concert hall. Where is no chaos, everyone has their own seat, sitting calmly.'
			]
		)->afterCreating(function (QuizAnswer $quizAnswer) {
			switch($quizAnswer->title) {
				case 'Crowded. I like to blend in a crowd, see different face on every moment.':
					$quizAnswer->results()->sync(QuizResult::whereIn('title', ['POP', 'Electronic'])->get()->pluck('id'));

					break;
				case 'With less people. Like in a bar, where it is comfy.':
					$quizAnswer->results()->sync(QuizResult::whereIn('title', ['Rock', 'Rap'])->get()->pluck('id'));

					break;
				case 'In a concert hall. Where is no chaos, everyone has their own seat, sitting calmly.':
					$quizAnswer->results()->sync([QuizResult::where('title', '=', 'classical')->first()->id]);

					break;
			}
        })->create();

		$quizQuestion4 = QuizQuestion::factory()->create([
			'quiz_id' => $quiz->id,
			'number' => 5,
			'title' => 'Do you like public events'
		]);

		QuizAnswer::factory()->count(2)->sequence(
			[
				'quiz_question_id' => $quizQuestion4->id,
				'title' => 'Only buying a ticket to an events of my dreams.'
			],
			[
				
				'quiz_question_id' => $quizQuestion4->id,
				'title' => 'Of course! I’m having a blast there!'
			]
		)->afterCreating(function (QuizAnswer $quizAnswer) {
			switch($quizAnswer->title) {
				case 'Only buying a ticket to an events of my dreams.':
					$quizAnswer->results()->sync(QuizResult::whereIn('title', ['Rock', 'Rap', 'POP'])->get()->pluck('id'));

					break;
				case 'Of course! I’m having a blast there!':
					$quizAnswer->results()->sync(QuizResult::whereIn('title', ['POP', 'Electronic'])->get()->pluck('id'));

					break;
			}
        })->create();

		$quizQuestion5 = QuizQuestion::factory()->create([
			'quiz_id' => $quiz->id,
			'number' => 4,
			'title' => 'Which genre of movies do you like the most?'
		]);

		QuizAnswer::factory()->count(4)->sequence(
			[
				'quiz_question_id' => $quizQuestion5->id,
				'title' => 'Drama'
			],
			[
				
				'quiz_question_id' => $quizQuestion5->id,
				'title' => 'Comedy'
			],
			[
				
				'quiz_question_id' => $quizQuestion5->id,
				'title' => 'Thriller'
			],
			[
				
				'quiz_question_id' => $quizQuestion5->id,
				'title' => 'Horror'
			]
		)->afterCreating(function (QuizAnswer $quizAnswer) {
			switch($quizAnswer->title) {
				case 'Drama':
					$quizAnswer->results()->sync(QuizResult::whereIn('title', ['POP', 'Classical'])->get()->pluck('id'));

					break;
				case 'Comedy':
					$quizAnswer->results()->sync(QuizResult::whereIn('title', ['Rock', 'Rap'])->get()->pluck('id'));

					break;
				case 'Thriller':
					$quizAnswer->results()->sync(QuizResult::whereIn('title', ['Rock', 'Pop', 'Classical'])->get()->pluck('id'));

					break;
				case 'Horror':
					$quizAnswer->results()->sync([QuizResult::where('title', '=', 'Rock')->first()->id]);

					break;
			}
        })->create();
    }
}
