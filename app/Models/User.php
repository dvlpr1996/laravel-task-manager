<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\Group;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
	use HasApiTokens, HasFactory, Notifiable;

	protected $fillable = [
		'fname',
		'lname',
		'email',
		'password',
	];

	protected $hidden = [
		'password',
		'remember_token',
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function tasks()
	{
		return $this->hasMany(Task::class)->orderByDesc('created_at');
	}

	public function groups()
	{
		return $this->hasMany(Group::class);
	}

	protected function fullName(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => $this->fname . ' ' . $this->lname,
		);
	}

	public function calculateDaysWithUs()
	{
		return (new Carbon($this->attributes['created_at']))->longAbsoluteDiffForHumans();
	}

	public function calculateTotalTask()
	{
		return $this->tasks()->count();
	}

	public function calculateUnDoneTask()
	{
		return $this->tasks()->where('status', '!=', '1')->count();
	}

	public function calculateTotalList()
	{
		return $this->groups()->count();
	}

	public function gravatar()
	{
		$hash = md5(strtolower($this->attributes['email']));
		return "http://s.gravatar.com/avatar/$hash";
	}

	public static function authUser()
	{
		return auth()->user();
	}
}
