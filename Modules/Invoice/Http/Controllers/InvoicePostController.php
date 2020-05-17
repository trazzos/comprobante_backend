<?php

namespace Modules\Invoice\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Invoice\Http\Requests\InvoicePostValidationRequest;
use Modules\Invoice\Services\InvoiceCreateService;
use Auth;

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
        $nodes = $request->validated();
        $nodes = [
            'cfdi:Comprobante' => [
                'children' => [
                    'cfdi:Emisor' => [
                        'attributes' => [
                            'Rfc' => 'TCM970625MB1',
                            'Nombre' => 'Daniel Lopez',
                            'RegimenFiscal' => "601",
                        ]
                    ],
                    'cfdi:Conceptos' => [
                        'children' => [
                            'cfdi:Concepto' => [
                                'attributes' => [
                                    'ClaveProdServ' => "01010101",
                                    'Cantidad' => "1.00",
                                    'ClaveUnidad' => "EA",
                                    'Unidad' => "1",
                                    'Descripcion' => "CONCEPTO A",
                                    'ValorUnitario' => "1.00",
                                    'Importe' => "1.00",
                                    'Descuento' => "0.05",
                                ],
                                'children' => [
                                    'cfdi:Impuestos' => [
                                        'children' => [
                                            'cfdi:Traslados' => [
                                                'children' => [
                                                    'cfdi:Traslado' => [
                                                        'attributes' => [
                                                            'Base' => "0.95",
                                                            'Impuesto' => "002",
                                                            'TipoFactor' => "Tasa",
                                                            'TasaOCuota' => "0.160000",
                                                            'Importe' => "0.15",
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ],
        ];
        $response = $this->invoiceCreateService->create(Auth::user(), $nodes);
        return $this->handleAjaxJsonResponse($response);
    }
}
