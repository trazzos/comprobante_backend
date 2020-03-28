<?php

namespace Modules\Action\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Action\Services\ActionDeleteService;
use Modules\Action\Http\Requests\ActionDeleteValidationRequest;
/**
 * Class ActionDeleteController
 * @package Modules\Action\Http\Controllers
 */
class ActionDeleteController extends Controller{

    /*
     * @var ActionDeleteService $actionDeleteService
     */
    private $actionDeleteService;

    /**
     * ActionDeleteController constructor.
     * @param ActionDeleteService $actionDeleteService
     */
    public function __construct(ActionDeleteService $actionDeleteService) {
        $this->actionDeleteService = $actionDeleteService;
    }

    /**
     * @param ActionDeleteValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(ActionDeleteValidationRequest $request) : JsonResponse {
        $response = $this->actionDeleteService->delete($request->get('id'));
        return $this->handleAjaxJsonResponse($response, "Acción eliminada");
    }
}
