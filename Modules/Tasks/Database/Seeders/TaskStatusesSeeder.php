<?php

namespace Modules\Tasks\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Tasks\Entities\TaskStatus;

class TaskStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertStatuses();
    }

     /**
     * Inserts statuses to task_statuses table, from TaskStatusEnum enum.
     *
     * @return void
     */
    public function insertStatuses()
    {
        $taskStatusEnumValues = TaskStatus::getEnumValues();

        foreach ($taskStatusEnumValues as $statusValue) {
            TaskStatus::create(['name' => $statusValue]);
        }
    }
}
