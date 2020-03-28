<?php

namespace Modules\Invoice\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Invoice\Http\Requests\InvoicePostValidationRequest;
use Modules\Invoice\Services\InvoiceCreateService;

/**
 * Class InvoicePostController
 * @package Modules\Invoice\Http\Controllers
 */
class InvoicePostController extends Controller {
    /**
     * @var $invoiceCreateService
     */
    private $invoiceCreateService;

    /**
     * InvoiceGetController constructor.
     * @param InvoiceCreateService $invoiceCreateService
     */
    public function __construct(InvoiceCreateService $invoiceCreateService) {
        $this->invoiceCreateService = $invoiceCreateService;
    }

    /**
     * @param InvoicePostValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(InvoicePostValidationRequest $request) : JsonResponse {
        $data = $request->validated();
        $response = $this->invoiceCreateService->create($data);
        return $this->handleAjaxJsonResponse($response);
    }
}
