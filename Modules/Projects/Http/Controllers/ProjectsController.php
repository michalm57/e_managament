<?php

namespace Modules\Projects\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Projects\Http\Requests\ProjectRequest;
use Modules\Projects\Resources\ProjectResource;
use Modules\Projects\Services\ProjectService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

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

    public function store(ProjectRequest $request)
    {
        try {
            $this->projectService->create($request->validated());

            return new JsonResponse(
                ['status' => 'success', 'message' => 'Project has been created successfully!'],
                Response::HTTP_OK
            );
        } catch (\Exception $exception) {
            report($exception);

            return new JsonResponse(
                ['status' => 'error', 'message' => 'Unable to create project!'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
}
