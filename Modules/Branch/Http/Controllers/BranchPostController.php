<?php

namespace Modules\Branch\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Branch\Http\Requests\BranchPostValidationRequest;
use Modules\Branch\Services\BranchPostService;

/**
 * Class BranchPostController
 * @package Modules\Branch\Http\Controllers
 */
class BranchPostController extends Controller {
    /**
     * @var $branchPostService
     */
    private $branchPostService;

    /**
     * BranchPostController constructor.
     * @param BranchPostService $branchPostService
     */
    public function __construct(BranchPostService $branchPostService) {
        $this->branchPostService = $branchPostService;
    }

    /**
     * @param BranchPostValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(BranchPostValidationRequest $request) : JsonResponse {
        $data = $request->validated();
        $response = $this->branchPostService->create($data);
        return $this->handleAjaxJsonResponse($response);
    }
}
