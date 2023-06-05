<?php

namespace Modules\Projects\Services;


class ProjectService
{
    public function getAllUserProjects($user)
    {
        return $user->projects();
    }
}
