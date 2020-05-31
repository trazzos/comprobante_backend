<?php

namespace Modules\Branch\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Branch\Http\Requests\BranchPatchValidationRequest;
use Modules\Branch\Services\BranchPatchService;
use Modules\Label\Services\LabelPatchService;

/**
 * Class BranchPatchController
 * @package Modules\Branch\Http\Controllers
 */
class BranchPatchController extends Controller {
    /**
     * @var BranchPatchService $branchPatchService
     */
    private BranchPatchService $branchPatchService;

    /**
     * BranchPatchController constructor.
     * @param BranchPatchService $branchPatchService
     */
    public function __construct(BranchPatchService $branchPatchService) {
        $this->branchPatchService = $branchPatchService;
    }

    /**
     * @param BranchPatchValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(BranchPatchValidationRequest $request) : JsonResponse {
        $response = $this->branchPatchService->update($request->validated());
        return $this->handleAjaxJsonResponse($response, 'Registro actualizado.');
    }
}
