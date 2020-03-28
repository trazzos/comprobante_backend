<?php

namespace Modules\Announcement\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Announcement\Http\Requests\AnnouncementPatchValidationRequest;
use Modules\Announcement\Services\AnnouncementPatchService;

/**
 * Class AnnouncementPatchController
 * @package Modules\Announcement\Http\Controllers
 */
class AnnouncementPatchController extends Controller
{
    /**
     * @var AnnouncementPatchService $announcementPatchService
     */
    private $announcementPatchService;

    /**
     * AnnouncementPatchController constructor
     * @param AnnouncementPatchService $announcementPatchService
     */
    public function __construct(AnnouncementPatchService $announcementPatchService){
        $this->announcementPatchService = $announcementPatchService;
    }

    /**
     * @param AnnouncementPatchValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(AnnouncementPatchValidationRequest $request) : JsonResponse {
        $response = $this->announcementPatchService->update($request->validated(), $request->get("id"));

        return $this->handleAjaxJsonResponse($response, 'Convocatoria actualizada con exito.');
    }
}
