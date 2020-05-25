<?php

namespace Modules\Label\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Label\Http\Requests\LabelPatchValidationRequest;
use Modules\Label\Services\LabelPatchService;

/**
 * Class LabelPatchController
 * @package Modules\Label\Http\Controllers
 */
class LabelPatchController extends Controller {
    /**
     * @var $labelPatchService
     */
    private $labelPatchService;

    /**
     * LabelPatchController constructor.
     * @param LabelPatchService $labelPatchService
     */
    public function __construct(LabelPatchService $labelPatchService) {
        $this->labelPatchService = $labelPatchService;
    }

    /**
     * @param LabelPatchValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(LabelPatchValidationRequest $request) : JsonResponse {
        $response = $this->labelPatchService->update($request->validated());
        return $this->handleAjaxJsonResponse($response, 'Registro actualizado.');
    }
}
