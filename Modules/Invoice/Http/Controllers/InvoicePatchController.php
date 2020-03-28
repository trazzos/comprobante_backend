<?php

namespace Modules\Invoice\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Invoice\Http\Requests\InvoicePatchValidationRequest;
use Modules\Invoice\Services\InvoicePatchService;

/**
 * Class InvoicePatchController
 * @package Modules\Invoice\Http\Controllers
 */
class InvoicePatchController extends Controller {
    /**
     * @var $invoicePatchService
     */
    private $invoicePatchService;

    /**
     * InvoicePatchController constructor.
     * @param InvoicePatchService $invoicePatchService
     */
    public function __construct(InvoicePatchService $invoicePatchService) {
        $this->invoicePatchService = $invoicePatchService;
    }

    /**
     * @param InvoicePatchValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(InvoicePatchValidationRequest $request) : JsonResponse {        
        $response = $this->invoicePatchService->update($request->validated(),$request->get("id"));
        return $this->handleAjaxJsonResponse($response, 'Folio actualizado con exito.');
    }
}
