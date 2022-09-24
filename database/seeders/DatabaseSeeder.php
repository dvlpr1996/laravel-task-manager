<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TaskSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\GroupSeeder;
use Database\Seeders\PrioritySeeder;

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		$this->call([
			UserSeeder::class,
			GroupSeeder::class,
			PrioritySeeder::class,
			TaskSeeder::class
		]);
	}
}
