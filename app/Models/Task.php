<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Group;
use App\Models\Priority;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
		'description',
		'due_date',
		'reminder',
		'status',
		'user_id',
		'group_id',
		'priority_id',
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function priority()
	{
		return $this->belongsTo(Priority::class);
	}

	public function group()
	{
		return $this->belongsTo(Group::class);
	}

	protected function status(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => ($value == 0) ? $value = 'undone' : $value = 'done',
			set: fn ($value) => ($value == 'undone') ? $value = 0 : $value = 1
		);
	}

	protected function dueDate(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => ($value != null) ? Carbon::create($value)->toFormattedDateString() : 'not defined'
		);
	}

	protected function createdAt(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => Carbon::create($value)->toFormattedDateString()
		);
	}

	protected function reminder(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => ($value == 1) ? $value = 'yes' : $value = 'no',
		);
	}
}
