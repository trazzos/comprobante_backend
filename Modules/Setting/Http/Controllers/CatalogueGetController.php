<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Setting\Http\Requests\CatalogueGetValidationRequest;
use Modules\Setting\Services\CatalogueGetService;

class CatalogueGetController extends Controller
{
    private $catalogueGetService;

    /**
     * CatalogueGetController constructor.
     * @param CatalogueGetService $catalogueGetService
     */
    public function __construct(CatalogueGetService $catalogueGetService) {
        $this->catalogueGetService = $catalogueGetService;
    }

    /**
     * @param CatalogueGetValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(CatalogueGetValidationRequest $request) : JsonResponse {
        $response = $this->catalogueGetService->list($request->validated());
        return $this->handleAjaxJsonResponse($response);
    }
}
