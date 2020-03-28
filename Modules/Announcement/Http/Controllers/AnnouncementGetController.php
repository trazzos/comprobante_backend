<?php

namespace Modules\Announcement\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Announcement\Http\Requests\AnnouncementGetValidationRequest;
use Modules\Announcement\Services\AnnouncementGetService;

/**
 * Class AnnouncementGetController
 * @package Modules\Announcement\Http\Controllers
 */
class AnnouncementGetController extends Controller{

    private $announcementGetService;

    /**
     * AnnouncementGetController constructor.
     * @param AnnouncementGetService $announcementGetService
     */
    public function __construct(AnnouncementGetService $announcementGetService) {
        $this->announcementGetService = $announcementGetService;
    }

    /**
     * @param AnnouncementGetValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(AnnouncementGetValidationRequest $request) : JsonResponse {
        $filters = $request->validated();
        $response = $this->announcementGetService->list($filters);
        return $this->handleAjaxJsonResponse($response);
    }
}
