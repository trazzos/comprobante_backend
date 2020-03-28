<?php

namespace Modules\Announcement\Services;

use Modules\Announcement\Repositories\Interfaces\AnnouncementRepositoryInterface;

/**
 * Class AnnouncementDeleteService
 * @package Modules\Announcement\Services
 */
class AnnouncementDeleteService {
    /**
     * @var AnnouncementRepositoryInterface
     */
    private $announcementRepo;

    /**
     * AnnouncementDeleteService constructor.
     * @param AnnouncementRepositoryInterface $announcementRepo
     */
    public function __construct(AnnouncementRepositoryInterface $announcementRepo) {
        $this->announcementRepo = $announcementRepo;
    }

    /**
     * @param $id
     * @return false|true
     */
    public function delete($id): ? bool {
        return $this->announcementRepo->delete($id);
    }
}
