<?php

namespace Modules\Company\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Company\Http\Requests\CompanyDeleteValidationRequest;
use Modules\Company\Services\CompanyDeleteService;

/**
 * Class CompanyDeleteController
 * @package Modules\Company\Http\Controllers
 */
class CompanyDeleteController extends Controller {
    /**
     * @var $companyDeleteService
     */
    private $companyDeleteService;

    /**
     * CompanyDeleteController constructor.
     * @param CompanyDeleteService $companyDeleteService
     */
    public function __construct(CompanyDeleteService $companyDeleteService) {
        $this->companyDeleteService = $companyDeleteService;
    }

    /**
     * @param CompanyDeleteValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(CompanyDeleteValidationRequest $request) : JsonResponse {
        $response = $this->companyDeleteService->delete($request->get("id"));

        return $this->handleAjaxJsonResponse($response);
    }
}
