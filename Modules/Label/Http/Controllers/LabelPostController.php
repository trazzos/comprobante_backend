<?php

namespace Modules\Label\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Label\Http\Requests\LabelPostValidationRequest;
use Modules\Label\Services\LabelPostService;

/**
 * Class LabelPostController
 * @package Modules\Label\Http\Controllers
 */
class LabelPostController extends Controller {
    /**
     * @var $labelPostService
     */
    private $labelPostService;

    /**
     * LabelPostController constructor.
     * @param LabelPostService $labelPostService
     */
    public function __construct(LabelPostService $labelPostService) {
        $this->labelPostService = $labelPostService;
    }

    /**
     * @param LabelPostValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(LabelPostValidationRequest $request) : JsonResponse {
        $data = $request->validated();
        $response = $this->labelPostService->create($data);
        return $this->handleAjaxJsonResponse($response);
    }
}
