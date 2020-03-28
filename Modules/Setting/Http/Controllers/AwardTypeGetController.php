<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Setting\Services\AwardTypeGetService;

class AwardTypeGetController extends Controller
{
    private $awardTypeGetService;

    /**
     * AwardTypeGetController constructor.
     * @param AwardTypeGetService $awardTypeGetService
     */
    public function __construct(AwardTypeGetService $awardTypeGetService) {
        $this->awardTypeGetService = $awardTypeGetService;
    }

    /**
     * @return JsonResponse
     */
    public function __invoke() : JsonResponse {
        $response = $this->awardTypeGetService->list();
        return $this->handleAjaxJsonResponse($response);
    }
}
