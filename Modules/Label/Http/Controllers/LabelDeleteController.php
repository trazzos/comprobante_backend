<?php

namespace Modules\Label\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Label\Http\Requests\LabelDeleteValidationRequest;
use Modules\Label\Services\LabelDeleteService;

/**
 * Class LabelDeleteController
 * @package Modules\Label\Http\Controllers
 */
class LabelDeleteController extends Controller {
    /**
     * @var $labelDeleteService
     */
    private $labelDeleteService;

    /**
     * LabelDeleteController constructor.
     * @param LabelDeleteService $labelDeleteService
     */
    public function __construct(LabelDeleteService $labelDeleteService) {
        $this->labelDeleteService = $labelDeleteService;
    }

    /**
     * @param LabelDeleteValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(LabelDeleteValidationRequest $request) : JsonResponse {
        $response = $this->labelDeleteService->delete($request->get("id"));

        return $this->handleAjaxJsonResponse($response,"Registro eliminado");
    }
}
