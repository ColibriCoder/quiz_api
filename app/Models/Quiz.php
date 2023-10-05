<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Quiz extends Model
{
	use HasFactory;

	public function getRouteKeyName(): string
    {
        return 'external_key';
    }

	public function media(): HasOne
	{
		return $this->hasOne(Media::class, 'id', 'media_id');
	}
}