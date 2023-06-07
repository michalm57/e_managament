<?php

namespace Modules\Projects\Services;

use Illuminate\Support\Facades\Auth;
use Modules\Projects\Entities\Project;
use Modules\Projects\Entities\ProjectStatus;
use Modules\Projects\Enums\ProjectStatusEnum;

class ProjectService
{
    /**
     * Get all projects for the currently authenticated user.
     *
     * @return \Illuminate\Database\Eloquent\Collection The collection of projects.
     */
    public function getAllUserProjects()
    {
        return Auth::user()->projects()->get();
    }

    /**
     * Creating new project with ProjectStatusEnum::Created status id.
     *
     * @param array $data.
     */
    public function create($data)
    {
        $data['project_status_id'] = ProjectStatus::getStatusId(ProjectStatusEnum::Created);

        return Project::create($data);
    }
}
