<?php

namespace App\Models;

use App\Models\User;
use App\Models\Group;
use App\Models\Priority;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
		'description',
		'due_date',
		'reminder',
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
}
