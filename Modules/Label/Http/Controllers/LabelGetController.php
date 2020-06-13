<?php

namespace Modules\Label\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Label\Http\Requests\LabelGetValidationRequest;
use Modules\Label\Services\LabelGetService;

/**
 * Class LabelGetController
 * @package Modules\Label\Http\Controllers
 */
class LabelGetController extends Controller {

    /**
     * @var LabelGetService $labelGetService
     */
    private LabelGetService $labelGetService;

    /**
     * LabelGetController constructor.
     * @param LabelGetService $labelGetService
     */
    public function __construct(LabelGetService $labelGetService) {
        $this->labelGetService = $labelGetService;
    }

    /**
     * @param LabelGetValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(LabelGetValidationRequest $request) : JsonResponse {
        $filters = $request->validated();
        $response = $this->labelGetService->list($filters);
        return $this->handleAjaxJsonResponse($response, "Registros encontrados");
    }
}
