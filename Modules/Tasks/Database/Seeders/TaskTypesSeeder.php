<?php

namespace Modules\Tasks\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Tasks\Entities\TaskType;

class TaskTypesSeeder extends Seeder
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
     * Inserts priorities to task_types table, from TaskTypeEnum enum.
     *
     * @return void
     */
    public function insertPriorities()
    {
        $taskTypeEnumValues = TaskType::getEnumValues();

        foreach ($taskTypeEnumValues as $typeValue) {
            TaskType::create(['name' => $typeValue]);
        }
    }
}
