<?php

namespace Modules\Tasks\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Tasks\Entities\TaskPriority;

class TaskPrioritiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertPriorities();
    }

     /**
     * Inserts priorities to task_priorities table, from TaskPriorityEnum enum.
     *
     * @return void
     */
    public function insertPriorities()
    {
        $taskPrioritiesEnumValues = TaskPriority::getEnumValues();

        foreach ($taskPrioritiesEnumValues as $priorityValue) {
            TaskPriority::create(['name' => $priorityValue]);
        }
    }
}
