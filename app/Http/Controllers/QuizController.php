<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizResult;

class QuizController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $quiz = Quiz::with('media')->select('id', 'external_key', 'title', 'description', 'media_id')->get();

		return response()->json($quiz);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Quiz $quiz): JsonResponse
    {
		$quiz->load('media');

		if (empty($quiz->id)) {
			return response()->json(['error' => 'No quiz with this uuid'], 404);
		}

		$quiz->questions_count = QuizQuestion::where('quiz_id', $quiz->id)->count();

		return response()->json($quiz);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

	public function questions(string $quizId): JsonResponse
	{
		$questions = QuizQuestion::where('quiz_id', $quizId)
			->with(['answers' => ['results:id']])
			->orderBy('number')
			->get();

		if (!count($questions)) {
			return response()->json(['error' => 'No quiz questions with this quiz id'], 404);
		}

		return response()->json($questions);
	}

	public function result(string $resultId): JsonResponse
	{
		$result = QuizResult::with(['media'])->where('id', $resultId)->first();

		return response()->json($result);
	}
}
