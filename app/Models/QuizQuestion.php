<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizQuestion extends Model
{
	use HasFactory;
	// protected $table = 'quizzes_questions';
	// public function getRouteKeyName()
    // {
    //     return 'external_key';
    // }

	public function answers(): HasMany
	{
		return $this->hasMany(QuizAnswer::class);
	}

}