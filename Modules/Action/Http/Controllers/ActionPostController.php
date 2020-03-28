<?php

namespace Modules\Action\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Action\Http\Requests\ActionPostValidationRequest;
use Modules\Action\Services\ActionCreateService;

/**
 * Class ActionPostController
 * @package Modules\Action\Http\Controllers
 */
class ActionPostController extends Controller
{
    /**
     * @var ActionCreateService
     */
    private $actionCreateService;

    /**
     * ActionPostController constructor
     * @param ActionCreateService $actionCreateService
     */
    public function __construct(ActionCreateService $actionCreateService){
        $this->actionCreateService = $actionCreateService;
    }

    /**
     * @param ActionPostValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(ActionPostValidationRequest $request) : JsonResponse {
        $response = $this->actionCreateService->create($request->validated());

        return $this->handleAjaxJsonResponse($response,"Accion registrada");
    }

}
