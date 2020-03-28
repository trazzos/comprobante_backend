<?php

namespace Modules\Announcement\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Announcement\Http\Requests\AnnouncementPostValidationRequest;
use Modules\Announcement\Services\AnnouncementCreateService;

/**
 * Class AnnouncementPostController
 * @package Modules\Announcement\Http\Controllers
 */
class AnnouncementPostController extends Controller
{
    /**
     * @var AnnouncementCreateService
     */
    private $announcementCreateService;

    /**
     * AnnouncementPostController constructor
     * @param AnnouncementCreateService $announcementCreateService
     */
    public function __construct(AnnouncementCreateService $announcementCreateService){
        $this->announcementCreateService = $announcementCreateService;
    }

    /**
     * @param AnnouncementPostValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(AnnouncementPostValidationRequest $request) : JsonResponse {
        $response = $this->announcementCreateService->create($request->validated());

        return $this->handleAjaxJsonResponse($response);
    }

}
