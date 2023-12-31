<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizQuestion extends Model
{
	use HasFactory;

	public function answers(): HasMany
	{
		return $this->hasMany(QuizAnswer::class);
	}

}