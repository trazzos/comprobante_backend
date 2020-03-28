<?php

namespace Modules\AnnouncementType\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\AnnouncementType\Http\Requests\AnnouncementTypeGetValidationRequest;
use Modules\AnnouncementType\Services\AnnouncementTypeGetService;

/**
 * Class AnnouncementTypeGetController
 * @package Modules\AnnouncementType\Http\Controllers
 */
class AnnouncementTypeGetController extends Controller {
    private $announcement_typeGetService;

    /**
     * AnnouncementTypeGetController constructor.
     * @param AnnouncementTypeGetService $announcement_typeGetService
     */
    public function __construct(AnnouncementTypeGetService $announcement_typeGetService) {
        $this->announcement_typeGetService = $announcement_typeGetService;
    }

    /**
     * @param AnnouncementTypeGetValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(AnnouncementTypeGetValidationRequest $request) : JsonResponse {        
        $response = $this->announcement_typeGetService->list();
        return $this->handleAjaxJsonResponse($response);
    }
}
