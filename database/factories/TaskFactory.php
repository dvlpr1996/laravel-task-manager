<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
	public function definition()
	{
		return [
			"title" => $this->faker->text(5),
			"status" => $this->faker->numberBetween(0, 1),
			"tag_id" => Tag::factory(),
			"group_id" => Group::factory(),
			"due_date" =>  $this->faker->dateTimeThisYear(),
			"completed_at" =>  $this->faker->dateTimeThisYear()

		];
	}
}
