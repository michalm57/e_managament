<?php

namespace Modules\Projects\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Projects\Entities\Project;
use Modules\Projects\Entities\ProjectStatus;

class ProjectsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertRandomProjects(10);
    }

     /**
     * Inserts random projects in the number given in the parameter $countOfProjects
     *
     * @param int $countOfProjects
     * @return void
     */
    public function insertRandomProjects($countOfProjects)
    {
        for ($i = 0; $i < $countOfProjects; $i++) {
            $projectData = $this->generateRandomProject();

            Project::create($projectData);
        }
    }


    /**
     * Generating random project with Faker
     *
     * @return array
     */
    public function generateRandomProject()
    {
        $faker = \Faker\Factory::create();
        $projectStatuses = ProjectStatus::all()->pluck('id')->toArray();

        return [
            'name' => $faker->company(),
            'description' => $faker->sentence($faker->randomDigitNotNull()),
            'project_status_id' => $faker->randomElement($projectStatuses),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
