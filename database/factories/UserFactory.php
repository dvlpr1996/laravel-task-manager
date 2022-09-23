<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
	public function definition()
	{
		return [
			'fname' => fake()->firstName(),
			'lname' => fake()->lastName(),
			'email' => fake()->unique()->safeEmail(),
			'email_verified_at' => now(),
			'password' => fake()->password(6,  12),
			'remember_token' => Str::random(10),
		];
	}

	/**
	 * Indicate that the model's email address should be unverified.
	 *
	 * @return static
	 */
	public function unverified()
	{
		return $this->state(fn (array $attributes) => [
			'email_verified_at' => null,
		]);
	}
}
