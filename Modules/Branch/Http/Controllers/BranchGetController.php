<?php

namespace Modules\Branch\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Branch\Http\Requests\BranchGetValidationRequest;
use Modules\Branch\Services\BranchGetService;

/**
 * Class BranchGetController
 * @package Modules\Branch\Http\Controllers
 */
class BranchGetController extends Controller {
    /**
     * @var $branchGetService
     */
    private $branchGetService;

    /**
     * BranchGetController constructor.
     * @param BranchGetService $branchGetService
     */
    public function __construct(BranchGetService $branchGetService) {
        $this->branchGetService = $branchGetService;
    }

    /**
     * @param BranchGetValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(BranchGetValidationRequest $request) : JsonResponse {
        $filters = $request->validated();
        $response = $this->branchGetService->list($filters);
        return $this->handleAjaxJsonResponse($response);
    }
}
