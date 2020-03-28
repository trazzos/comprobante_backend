<?php

namespace Modules\Stage\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Stage\Http\Requests\StageGetValidationRequest;
use Modules\Stage\Services\StageGetService;

/**
 * Class StageGetController
 * @package Modules\Stage\Http\Controllers
 */
class StageGetController extends Controller{

    private $stageGetService;

    /**
     * StageGetController constructor.
     * @param StageGetService $stageGetService
     */
    public function __construct(StageGetService $stageGetService) {
        $this->stageGetService = $stageGetService;
    }

    /**
     * @param StageGetValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(StageGetValidationRequest $request) : JsonResponse {
        $filters =  $request->validated();
        $response = $this->stageGetService->list($filters);
        return $this->handleAjaxJsonResponse($response);
    }
}
