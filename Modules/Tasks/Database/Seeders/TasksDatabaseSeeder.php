<?php

namespace Modules\Tasks\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Tasks\Entities\TaskPriority;
use Modules\Tasks\Entities\TaskStatus;
use Modules\Tasks\Entities\TaskType;
use Modules\Tasks\Entities\Task;

class TasksDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertRandomTasks(20);
    }

     /**
     * Inserts random tasks in the number given in the parameter $countOfTasks
     *
     * @param int $countOfTasks
     * @return void
     */
    public function insertRandomTasks($countOfTasks)
    {
        for ($i = 0; $i < $countOfTasks; $i++) {
            $taskData = $this->generateRandomTask();

            Task::create($taskData);
        }
    }

    /**
     * Generating random task with Faker
     *
     * @return array
     */
    public function generateRandomTask()
    {
        $faker = \Faker\Factory::create();
        $taskPriorities = TaskPriority::all()->pluck('id')->toArray();
        $taskTypes = TaskType::all()->pluck('id')->toArray();
        $taskStatuses = TaskStatus::all()->pluck('id')->toArray();

        return [
            'name' => $faker->company(),
            'description' => $faker->sentence($faker->randomDigitNotNull()),
            'estimation' => $faker->randomDigitNot(9),
            'spend_time' => $faker->randomDigitNot(9),
            'priority_id' => $faker->randomElement($taskPriorities),
            'type_id' => $faker->randomElement($taskTypes),
            'status_id' => $faker->randomElement($taskStatuses),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
