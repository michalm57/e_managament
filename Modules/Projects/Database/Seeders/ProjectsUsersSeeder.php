<?php

namespace Modules\Projects\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Projects\Entities\Project;
use Modules\Projects\Entities\ProjectUser;
use Modules\Users\Entities\User;

class ProjectsUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertRandomProjectUser(30);
    }

     /**
     * Inserts random project_users records in the number given in the parameter $countOfProjectsUsers
     *
     * @param int $countOfProjects
     * @return void
     */
    public function insertRandomProjectUser($countOfProjectsUsers)
    {
        for ($i = 0; $i < $countOfProjectsUsers; $i++) {
            $projectUserData = $this->generateRandomProjectUser();

            ProjectUser::create($projectUserData);
        }
    }


    /**
     * Generating random project_user
     *
     * @param int $countOfRandomUsers
     * @return array
     */
    public function generateRandomProjectUser()
    {
        return [
            'project_id' => Project::getRandomId(),
            'user_id' => User::getRandomId(),
        ];
    }
}
