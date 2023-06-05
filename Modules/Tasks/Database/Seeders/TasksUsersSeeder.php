<?php

namespace Modules\Tasks\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Tasks\Entities\Task;
use Modules\Tasks\Entities\TaskUser;
use Modules\Users\Entities\User;

class TasksUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertRandomUserTask(30);
    }

     /**
     * Inserts random task_users records in the number given in the parameter $countOfTasksUsers.
     *
     * @param int $countOfProjectsUsers
     * @return void
     */
    public function insertRandomUserTask($countOfTasksUsers)
    {
        for ($i = 0; $i < $countOfTasksUsers; $i++) {
            $taskUserData = $this->generateRandomTaskUser();

            TaskUser::create($taskUserData);
        }
    }


    /**
     * Generating random task_users record.
     *
     * @return array
     */
    public function generateRandomTaskUser()
    {
        return [
            'task_id' => Task::getRandomId(),
            'user_id' => User::getRandomId(),
        ];
    }
}
