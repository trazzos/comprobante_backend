<?php

namespace Modules\Action\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Action\Http\Requests\ActionGetValidationRequest;
use Modules\Action\Services\ActionGetService;

/**
 * Class ActionGetController
 * @package Modules\Action\Http\Controllers
 */
class ActionGetController extends Controller{

    private $actionGetService;

    /**
     * ActionGetController constructor.
     * @param ActionGetService $actionGetService
     */
    public function __construct(ActionGetService $actionGetService) {
        $this->actionGetService = $actionGetService;
    }

    /**
     * @param ActionGetValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(ActionGetValidationRequest $request) : JsonResponse {
        $filters = $request->validated();
        $response = $this->actionGetService->list($filters);
        return $this->handleAjaxJsonResponse($response);
    }
}
