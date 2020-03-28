<?php

namespace Modules\Task\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Task\Services\TaskDeleteService;
use Modules\Task\Http\Requests\TaskDeleteValidationRequest;
/**
 * Class TaskDeleteController
 * @package Modules\Task\Http\Controllers
 */
class TaskDeleteController extends Controller{

    /*
     * @var TaskDeleteService $taskDeleteService
     */
    private $taskDeleteService;

    /**
     * TaskDeleteController constructor.
     * @param TaskDeleteService $taskDeleteService
     */
    public function __construct(TaskDeleteService $taskDeleteService) {
        $this->taskDeleteService = $taskDeleteService;
    }

    /**
     * @param TaskDeleteValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(TaskDeleteValidationRequest $request) : JsonResponse {
        $response = $this->taskDeleteService->delete($request->get('id'));
        return $this->handleAjaxJsonResponse($response,"Tarea eliminada");

    }
}
