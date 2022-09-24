<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
	public function definition()
	{
		return [
			"name" => fake()->words(mt_rand(1, 5), true)
		];
	}
}
