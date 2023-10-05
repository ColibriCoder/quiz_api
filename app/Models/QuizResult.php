<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizResult extends Model
{
	use HasFactory;
	// protected $table = 'quizzes_questions';
	// public function getRouteKeyName()
    // {
    //     return 'external_key';
    // }

	// public function answers(): BelongsToMany
	// {
	// 	return $this->hasMany(QuizAnswer::class);
	// }

}