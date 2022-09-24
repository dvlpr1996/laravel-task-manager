<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PrioritySeeder extends Seeder
{
	public function run()
	{
		$priorities = [
			'one' => [
				'level' => 'priority_one',
				'icon' => 'fas fa-flag'
			],
			'two' => [
				'level' => 'priority_two',
				'icon' => 'fas fa-flag'
			],
			'three' => [
				'level' => 'priority_three',
				'icon' => 'fas fa-flag'
			],
			'none' => [
				'level' => 'none',
				'icon' => 'fas fa-flag'
			]
		];

		foreach ($priorities as $prioritiesLevel => $prioritiesIcon) {
			Priority::create([
				'level' => $prioritiesIcon['level'],
				'icon' => $prioritiesIcon['icon']
			]);
		}
	}
}
