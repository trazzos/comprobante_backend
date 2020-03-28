<?php

namespace Modules\Stage\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Stage\Services\StageDeleteService;
use Modules\Stage\Http\Requests\StageDeleteValidationRequest;
/**
 * Class StageDeleteController
 * @package Modules\Stage\Http\Controllers
 */
class StageDeleteController extends Controller{

    /*
     * @var StageDeleteService $stageDeleteService
     */
    private $stageDeleteService;

    /**
     * StageDeleteController constructor.
     * @param StageDeleteService $stageDeleteService
     */
    public function __construct(StageDeleteService $stageDeleteService) {
        $this->stageDeleteService = $stageDeleteService;
    }

    /**
     * @param StageDeleteValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(StageDeleteValidationRequest $request) : JsonResponse {
        $response = $this->stageDeleteService->delete($request->get('id'));
        return $this->handleAjaxJsonResponse($response,'Etapa eliminada');

    }
}
