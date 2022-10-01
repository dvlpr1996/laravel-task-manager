<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
		'user_id',
	];

	public function tasks()
	{
		return $this->hasMany(Task::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	protected function createdAt(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => $value = date('y-M-d', strtotime($value)) ?? '-'
		);
	}

	protected function updatedAt(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => $value = date('y-M-d', strtotime($value)) ?? '-'
		);
	}
}
