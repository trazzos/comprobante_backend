<?php

namespace Modules\Action\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Action\Http\Requests\ActionPatchValidationRequest;
use Modules\Action\Services\ActionPatchService;

/**
 * Class ActionPatchController
 * @package Modules\Action\Http\Controllers
 */
class ActionPatchController extends Controller
{
    /**
     * @var ActionPatchService $actionPatchService
     */
    private $actionPatchService;

    /**
     * ActionPatchController constructor
     * @param ActionPatchService $actionPatchService
     */
    public function __construct(ActionPatchService $actionPatchService){
        $this->actionPatchService = $actionPatchService;
    }

    /**
     * @param ActionPatchValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(ActionPatchValidationRequest $request) : JsonResponse {
        $data = $request->validated();
        $response = $this->actionPatchService->update($data);

        return $this->handleAjaxJsonResponse($response,"Acción actualizada");
    }
}
