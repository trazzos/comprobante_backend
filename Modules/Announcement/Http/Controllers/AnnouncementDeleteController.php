<?php

namespace Modules\Announcement\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Announcement\Services\AnnouncementDeleteService;
use Modules\Announcement\Http\Requests\AnnouncementDeleteValidationRequest;
/**
 * Class AnnouncementDeleteController
 * @package Modules\Announcement\Http\Controllers
 */
class AnnouncementDeleteController extends Controller{

    /*
     * @var AnnouncementDeleteService $announcementDeleteService
     */
    private $announcementDeleteService;

    /**
     * AnnouncementDeleteController constructor.
     * @param AnnouncementDeleteService $announcementDeleteService
     */
    public function __construct(AnnouncementDeleteService $announcementDeleteService) {
        $this->announcementDeleteService = $announcementDeleteService;
    }

    /**
     * @param AnnouncementDeleteValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(AnnouncementDeleteValidationRequest $request) : JsonResponse {
        $response = $this->announcementDeleteService->delete($request->get('id'));
        return $this->handleAjaxJsonResponse($response);

    }
}
