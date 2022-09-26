<?php

namespace App\Models;

// todo : MustVerifyEmail and Verify mw
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Task;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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

	protected function fullName(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => $this->fname . ' '.$this->lname,
		);
	}
}
