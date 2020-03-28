<?php

namespace Modules\Project\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Project\Http\Requests\ProjectPatchValidationRequest;
use Modules\Project\Services\ProjectUpdateService;
use Auth;

/**
 * Class ProjectPatchController
 * @package Modules\Project\Http\Controllers
 */
class ProjectPatchController extends Controller {
    /**
     * @var ProjectUpdateService
     */
    private $projectPatchController;

    /**
     * projectPatchController constructor.
     * @param ProjectUpdateService $projectPatchController
     */
    public function __construct(ProjectUpdateService $projectPatchController) {
        $this->projectPatchController = $projectPatchController;
    }

    /**
     * @param ProjectPatchValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(ProjectPatchValidationRequest $request) : JsonResponse {
        $data = $request->validated();
        $response = $this->userUpdateService->update(Auth::user(), $data);
        return $this->handleAjaxJsonResponse($response);
    }
}
