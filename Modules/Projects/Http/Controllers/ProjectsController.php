<?php

namespace Modules\Projects\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Projects\Resources\ProjectResource;
use Modules\Projects\Services\ProjectService;

class ProjectsController extends Controller
{
    private $projectService;

    /**
     * ProjectsController constructor.
     * 
     * @param ProjectService $projectService The project service instance.
     */
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\JsonResponse The JSON response with the collection of projects.
     */
    public function index()
    {
        return response()->json([
            'data' => ProjectResource::collection($this->projectService->getAllUserProjects()),
        ]);
    }
}
