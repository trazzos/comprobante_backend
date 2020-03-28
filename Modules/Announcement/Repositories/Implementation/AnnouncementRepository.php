<?php

namespace Modules\Announcement\Repositories\Implementation;
use App\Repositories\Implementation\BaseRepository;
use Modules\Announcement\Models\Announcement;
use Modules\Announcement\Repositories\Interfaces\AnnouncementRepositoryInterface;


/**
 * Class AnnouncementRepository
 * @package Modules\Announcement\Repositories\Implementation
 */
class AnnouncementRepository extends BaseRepository implements AnnouncementRepositoryInterface {
    /**
     * @return string
     */
    public function model() : string {
        return Announcement::class;
    }
}
