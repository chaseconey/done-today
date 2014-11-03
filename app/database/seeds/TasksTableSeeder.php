<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TasksTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		Task::unguard();
		foreach(range(1, 1500) as $index)
		{

			Task::create([
				'name' => $faker->name,
				'done' => $faker->boolean(),
				'estimation' => $faker->randomFloat(5, 0, 10),
				'resolution_id' => $faker->numberBetween(0, 3),
				'created_at' => $faker->dateTimeThisYear,
				'updated_at' => $faker->dateTimeThisYear
			]);
		}
	}

}
