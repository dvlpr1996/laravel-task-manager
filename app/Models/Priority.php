<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Priority extends Model
{
	use HasFactory;

	public function tasks()
	{
		return $this->hasMany(Task::class);
	}

	protected function level(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => Str::slug($value)
		);
	}
}
