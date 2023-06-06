<?php

namespace Modules\Projects\Services;

use Illuminate\Support\Facades\Auth;

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
}
