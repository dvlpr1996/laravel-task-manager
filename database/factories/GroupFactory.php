<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
	public function definition()
	{
		return [
			"name" => fake()->words(mt_rand(1, 3), true),
			"user_id" => User::first() ?? User::factory()
		];
	}
}
