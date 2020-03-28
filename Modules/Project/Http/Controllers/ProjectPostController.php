<?php

namespace Modules\Project\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Project\Http\Requests\ProjectPostValidationRequest;
use Modules\Project\Services\ProjectCreateService;

/**
 * Class ProjectPostController
 * @package Modules\Project\Http\Controllers
 */
class ProjectPostController extends Controller {
    /**
     * @var $projectCreateService
     */
    private $projectCreateService;

    /**
     * ProjectGetController constructor.
     * @param ProjectCreateService $projectCreateService
     */
    public function __construct(ProjectCreateService $projectCreateService) {
        $this->projectCreateService = $projectCreateService;
    }

    /**
     * @param ProjectPostValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(ProjectPostValidationRequest $request) : JsonResponse {
        $data = $request->validated();
        $response = $this->projectCreateService->create($data);
        return $this->handleAjaxJsonResponse($response);
    }
}
