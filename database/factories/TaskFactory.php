<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Priority;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->words(mt_rand(4, 12), true),
            'description' => fake()->sentence(mt_rand(6, 32), true),
            'status' => mt_rand(0, 1),
            'due_date' => null,
            'reminder' => 0,
            'user_id' => User::first() ?? User::factory(),
            'group_id' => Group::first() ?? Group::factory(),
            'priority_id' => Priority::first() ?? Priority::factory(),
        ];
    }
}
