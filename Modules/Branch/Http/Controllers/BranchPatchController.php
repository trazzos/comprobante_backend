<?php

namespace Modules\Branch\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Branch\Http\Requests\BranchPatchValidationRequest;
use Modules\Branch\Services\BranchPatchService;

/**
 * Class BranchPatchController
 * @package Modules\Branch\Http\Controllers
 */
class BranchPatchController extends Controller {
    /**
     * @var $labelPatchService
     */
    private $labelPatchService;

    /**
     * BranchPatchController constructor.
     * @param BranchPatchService $labelPatchService
     */
    public function __construct(BranchPatchService $labelPatchService) {
        $this->labelPatchService = $labelPatchService;
    }

    /**
     * @param BranchPatchValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(BranchPatchValidationRequest $request) : JsonResponse {
        $response = $this->labelPatchService->update($request->validated());
        return $this->handleAjaxJsonResponse($response, 'Registro actualizado.');
    }
}
