<?php

namespace Modules\Invoice\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Invoice\Http\Requests\InvoiceDeleteValidationRequest;
use Modules\Invoice\Services\InvoiceDeleteService;

/**
 * Class InvoiceDeleteController
 * @package Modules\Invoice\Http\Controllers
 */
class InvoiceDeleteController extends Controller {
    /**
     * @var $invoiceDeleteService
     */
    private $invoiceDeleteService;

    /**
     * InvoiceDeleteController constructor.
     * @param InvoiceDeleteService $invoiceDeleteService
     */
    public function __construct(InvoiceDeleteService $invoiceDeleteService) {
        $this->invoiceDeleteService = $invoiceDeleteService;
    }

    /**
     * @param InvoiceDeleteValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(InvoiceDeleteValidationRequest $request) : JsonResponse {
        $response = $this->invoiceDeleteService->delete($request->get("id"));

        return $this->handleAjaxJsonResponse($response);
    }
}
