<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizResult extends Model
{
	use HasFactory;

	public function media(): HasOne
	{
		return $this->hasOne(Media::class, 'id', 'media_id');
	}
}