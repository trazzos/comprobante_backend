<?php

namespace Modules\Project\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Project\Http\Requests\ProjectDeleteValidationRequest;
use Modules\Project\Services\ProjectDeleteService;

/**
 * Class ProjectDeleteController
 * @package Modules\Project\Http\Controllers
 */
class ProjectDeleteController extends Controller {
    /**
     * @var $projectDeleteService
     */
    private $projectDeleteService;

    /**
     * ProjectDeleteController constructor.
     * @param ProjectDeleteService $projectDeleteService
     */
    public function __construct(ProjectDeleteService $projectDeleteService) {
        $this->projectDeleteService = $projectDeleteService;
    }

    /**
     * @param ProjectDeleteValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(ProjectDeleteValidationRequest $request) : JsonResponse {
        $id = $request->get('id');
        $response = $this->projectDeleteService->delete($id);
        return $this->handleAjaxJsonResponse($response);
    }
}
