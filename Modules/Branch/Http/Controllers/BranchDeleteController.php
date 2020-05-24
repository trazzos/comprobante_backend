<?php

namespace Modules\Branch\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Branch\Http\Requests\BranchDeleteValidationRequest;
use Modules\Branch\Services\BranchDeleteService;

/**
 * Class BranchDeleteController
 * @package Modules\Branch\Http\Controllers
 */
class BranchDeleteController extends Controller {
    /**
     * @var $branchDeleteService
     */
    private $branchDeleteService;

    /**
     * BranchDeleteController constructor.
     * @param BranchDeleteService $branchDeleteService
     */
    public function __construct(BranchDeleteService $branchDeleteService) {
        $this->branchDeleteService = $branchDeleteService;
    }

    /**
     * @param BranchDeleteValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(BranchDeleteValidationRequest $request) : JsonResponse {
        $response = $this->branchDeleteService->delete($request->get("id"));

        return $this->handleAjaxJsonResponse($response);
    }
}
