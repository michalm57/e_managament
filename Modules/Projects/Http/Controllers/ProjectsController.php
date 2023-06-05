<?php

namespace Modules\Projects\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Modules\Projects\Http\Requests\ProjectRequest;
use Modules\Projects\Http\Resources\ProjectResource;
use Modules\Users\Entities\User;

class ProjectsController extends Controller
{
    private $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index(ProjectRequest $request, User $user)
    {
        return response()->json([
            'data' => ProjectResource::collection($this->projectService->getAllUserProjects($user)),
        ]);
    }
}
