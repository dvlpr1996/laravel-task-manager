<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
	public function definition()
	{
		return [
			'fname' => $this->faker->firstName(),
			'lname' => $this->faker->lastName(),
			'email' => $this->faker->unique()->safeEmail(),
			"task_id" => Task::factory(),
			'email_verified_at' => now(),
			'password' =>  $this->faker->password(),
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
		return $this->state(function (array $attributes) {
			return [
				'email_verified_at' => null,
			];
		});
	}
}
