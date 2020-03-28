<?php

namespace Modules\Task\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Task\Http\Requests\TaskGetValidationRequest;
use Modules\Task\Services\TaskGetService;

/**
 * Class TaskGetController
 * @package Modules\Task\Http\Controllers
 */
class TaskGetController extends Controller{

    private $taskGetService;

    /**
     * TaskGetController constructor.
     * @param TaskGetService $taskGetService
     */
    public function __construct(TaskGetService $taskGetService) {
        $this->taskGetService = $taskGetService;
    }

    /**
     * @param TaskGetValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(TaskGetValidationRequest $request) : JsonResponse {
        $response = $this->taskGetService->list();
        return $this->handleAjaxJsonResponse($response);
    }
}
