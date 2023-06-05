<?php

namespace Modules\Projects\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Projects\Entities\Project;
use Modules\Projects\Entities\ProjectTask;
use Modules\Tasks\Entities\Task;

class ProjectTasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertRandomProjectTask(30);
    }

     /**
     * Inserts random project_tasks records in the number given in the parameter $countOfProjectTasks
     *
     * @param int $countOfProjectsUsers
     * @return void
     */
    public function insertRandomProjectTask($countOfProjectTasks)
    {
        for ($i = 0; $i < $countOfProjectTasks; $i++) {
            $projectTaskData = $this->generateRandomProjectTask();

            ProjectTask::create($projectTaskData);
        }
    }

    /**
     * Generating random project_tasks record
     *
     * @return array
     */
    public function generateRandomProjectTask()
    {
        return [
            'project_id' => Project::getRandomId(),
            'task_id' => Task::getRandomId(),
        ];
    }
}
