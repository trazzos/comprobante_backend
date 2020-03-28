<?php

namespace Modules\Company\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Company\Http\Requests\CompanyPostValidationRequest;
use Modules\Company\Services\CompanyCreateService;

/**
 * Class CompanyPostController
 * @package Modules\Company\Http\Controllers
 */
class CompanyPostController extends Controller {
    /**
     * @var $companyCreateService
     */
    private $companyCreateService;

    /**
     * CompanyGetController constructor.
     * @param CompanyCreateService $companyCreateService
     */
    public function __construct(CompanyCreateService $companyCreateService) {
        $this->companyCreateService = $companyCreateService;
    }

    /**
     * @param CompanyPostValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(CompanyPostValidationRequest $request) : JsonResponse {
        $data = $request->validated();
        $response = $this->companyCreateService->create($data);
        return $this->handleAjaxJsonResponse($response);
    }
}
