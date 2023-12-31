<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('quiz/{quiz:external_key}', [QuizController::class, 'show']);

Route::get('quiz/result/{resultId}', [QuizController::class, 'result']);
Route::get('quiz/{quizId}/questions', [QuizController::class, 'questions']);
Route::apiResource('quiz', QuizController::class)->only([
    'index', 'show'
]);

// Route::get('/quiz', [QuizController::class, 'index']);
