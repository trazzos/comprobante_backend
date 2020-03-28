<?php

namespace Modules\Invoice\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Invoice\Http\Requests\InvoiceGetValidationRequest;
use Modules\Invoice\Services\InvoiceGetService;

/**
 * Class InvoiceGetController
 * @package Modules\Invoice\Http\Controllers
 */
class InvoiceGetController extends Controller {
    /**
     * @var $invoiceGetService
     */
    private $invoiceGetService;

    /**
     * InvoiceGetController constructor.
     * @param InvoiceGetService $invoiceGetService
     */
    public function __construct(InvoiceGetService $invoiceGetService) {
        $this->invoiceGetService = $invoiceGetService;
    }

    /**
     * @param InvoiceGetValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(InvoiceGetValidationRequest $request) : JsonResponse {
        $filters = $request->validated();
        $response = $this->invoiceGetService->list($filters); //TODO temporary
        return $this->handleAjaxJsonResponse($response);
    }
}
