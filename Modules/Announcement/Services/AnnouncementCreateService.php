<?php

namespace Modules\Announcement\Services;

use Modules\Announcement\Models\Announcement;
use Modules\Announcement\Repositories\Interfaces\AnnouncementRepositoryInterface;

/**
 * Class AnnouncementCreateService
 * @package Modules\Announcement\Services
 */
class AnnouncementCreateService {
    /**
     * @var AnnouncementRepositoryInterface
     */
    private $announcementRepo;

    /**
     * AnnouncementCreateService constructor.
     * @param AnnouncementRepositoryInterface $announcementRepo
     */
    public function __construct(AnnouncementRepositoryInterface $announcementRepo) {
        $this->announcementRepo = $announcementRepo;
    }

    /**
     * @param array $data
     * @return Announcement|null
     */
    public function create(array $data) : ? Announcement {
        return $this->announcementRepo->create($data);
    }
}
