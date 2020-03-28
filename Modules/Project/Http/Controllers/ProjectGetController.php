<?php

namespace Modules\Project\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Project\Http\Requests\ProjectGetValidationRequest;
use Modules\Project\Services\ProjectGetService;

/**
 * Class ProjectGetController
 * @package Modules\Project\Http\Controllers
 */
class ProjectGetController extends Controller {
    /**
     * @var $projectGetService
     */
    private $projectGetService;

    /**
     * ProjectGetController constructor.
     * @param ProjectGetService $projectGetService
     */
    public function __construct(ProjectGetService $projectGetService) {
        $this->projectGetService = $projectGetService;
    }

    /**
     * @param ProjectGetValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(ProjectGetValidationRequest $request) : JsonResponse {
        $filters = $request->validated();
        $response = $this->projectGetService->list($filters);
        
        return $this->handleAjaxJsonResponse($response);
    }
}
