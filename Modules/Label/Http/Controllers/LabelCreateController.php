<?php

namespace Modules\Label\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Label\Http\Requests\LabelCreateValidationRequest;
use Modules\Label\Services\LabelCreateService;

/**
 * Class LabelPostController
 * @package Modules\Label\Http\Controllers
 */
class LabelCreateController extends Controller {
    /**
     * @var $labelCreateService
     */
    private $labelCreateService;

    /**
     * LabelCreateController constructor.
     * @param LabelCreateService $labelCreateService
     */
    public function __construct(LabelCreateService $labelCreateService) {
        $this->labelCreateService = $labelCreateService;
    }

    /**
     * @param LabelCreateValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(LabelCreateValidationRequest $request) : JsonResponse {
        $data = $request->validated();
        $response = $this->labelCreateService->create($data);
        return $this->handleAjaxJsonResponse($response);
    }
}
