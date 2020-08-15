<?php

namespace Modules\Company\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Company\Http\Requests\CompanyPostValidationRequest;
use Modules\Company\Services\CompanyPostService;
use Auth;

/**
 * Class CompanyPostController
 * @package Modules\Company\Http\Controllers
 */
class CompanyPostController extends Controller {

    /**
     * @var CompanyPostService $companyPostService
     */
    private CompanyPostService $companyPostService;

    /**
     * CompanyGetController constructor.
     * @param CompanyPostService $companyPostService
     */
    public function __construct(CompanyPostService $companyPostService) {
        $this->companyPostService = $companyPostService;
    }

    /**
     * @param CompanyPostValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(CompanyPostValidationRequest $request) : JsonResponse {
        $data = $request->validated();
        $response = $this->companyPostService->create(Auth::user(), $data);
        return $this->handleAjaxJsonResponse($response);
    }
}
