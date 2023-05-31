<?php

namespace Modules\Projects\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Projects\Entities\ProjectStatus;

class ProjectStatusesDatabaseSeeder extends Seeder
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
     * Inserts statuses to project_statuses table, from ProjectStatusEmum enum.
     *
     * @return void
     */
    public function insertStatuses()
    {
        $projectStatusesValues = ProjectStatus::getEnumValues();

        foreach ($projectStatusesValues as $statusValue) {
            ProjectStatus::create(['name' => $statusValue]);
        }
    }
}
