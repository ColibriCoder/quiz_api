<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizAnswer extends Model
{
	use HasFactory;
	// protected $table = 'quizzes_answers';
	// public function getRouteKeyName()
    // {
    //     return 'external_key';
    // }

	public function results(): BelongsToMany
	{
		return $this->belongsToMany(QuizResult::class);
	}

}