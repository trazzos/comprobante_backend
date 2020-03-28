<?php

namespace Modules\Company\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Company\Http\Requests\CompanyPatchValidationRequest;
use Modules\Company\Services\CompanyPatchService;

/**
 * Class CompanyPatchController
 * @package Modules\Company\Http\Controllers
 */
class CompanyPatchController extends Controller {
    /**
     * @var $companyPatchService
     */
    private $companyPatchService;

    /**
     * CompanyPatchController constructor.
     * @param CompanyPatchService $companyPatchService
     */
    public function __construct(CompanyPatchService $companyPatchService) {
        $this->companyPatchService = $companyPatchService;
    }

    /**
     * @param CompanyPatchValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(CompanyPatchValidationRequest $request) : JsonResponse {
        $response = $this->companyPatchService->update($request->validated(),$request->get("id"));
        return $this->handleAjaxJsonResponse($response, 'Empresa actualizada con exito.');
    }
}
