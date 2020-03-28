<?php

namespace Modules\Announcement\Services;
use Modules\Announcement\Models\Announcement;
use Modules\Announcement\Repositories\Interfaces\AnnouncementRepositoryInterface;
use ThrowException;

/**
 * Class AnnouncementPatchService
 * @package Modules\Announcement\Services
 */
class AnnouncementPatchService {
    /**
     * @var AnnouncementRepositoryInterface
     */
    private $announcementRepo;

    /**
     * AnnouncementPatchService constructor.
     * @param AnnouncementRepositoryInterface $announcementRepo
     */
    public function __construct(AnnouncementRepositoryInterface $announcementRepo) {
        $this->announcementRepo = $announcementRepo;
    }

    /**
     * @param $data source to update
     * @param $id register identifier that will be updated
     * @return Announcement
     */
    public function update(array $data, $id): ?Announcement{
        $announcement = $this->announcementRepo->updateAndReturn($data,$id);
        return $announcement;
    }
}
