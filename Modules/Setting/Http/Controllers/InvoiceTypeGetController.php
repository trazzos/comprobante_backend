<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Setting\Services\InvoiceTypeGetService;

class InvoiceTypeGetController extends Controller
{
    /*
     * @var InvoiceTypeGetService $invoiceTypeGetService
     */
    private InvoiceTypeGetService $invoiceTypeGetService;

    /**
     * InvoiceTypeGetController constructor.
     * @param InvoiceTypeGetService $invoiceTypeGetService
     */
    public function __construct(InvoiceTypeGetService $invoiceTypeGetService) {
        $this->invoiceTypeGetService = $invoiceTypeGetService;
    }

    /**
     * @return JsonResponse
     */
    public function __invoke() : JsonResponse {
        $response = $this->invoiceTypeGetService->list();
        return $this->handleAjaxJsonResponse($response);
    }
}
