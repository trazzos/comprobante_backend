<?php

namespace Modules\Announcement\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Announcement\Models\Announcement;
use Modules\Announcement\Repositories\Interfaces\AnnouncementRepositoryInterface;
use ThrowException;
use Filter;
use Sort;
/**
 * Class AnnouncementGetService
 * @package Modules\Announcement\Services
 */
class AnnouncementGetService {
    /**
     * @var AnnouncementRepositoryInterface
     */
    private $announcementRepo;

    /**
     * AnnouncementGetService constructor.
     * @param AnnouncementRepositoryInterface $announcementRepo
     */
    public function __construct(AnnouncementRepositoryInterface $announcementRepo) {
        $this->announcementRepo = $announcementRepo;
    }

    /**
     * @param array $data
     * @return LengthAwarePaginator|null
     */
    public function list(array $data) : ?LengthAwarePaginator {
        if(isset($data['predicates'])) {
            Filter::apply(__NAMESPACE__, $this->announcementRepo, $data['predicates']);
        }

        if(isset($data['sorts'])) {
            Sort::apply(__NAMESPACE__, $this->announcementRepo, $data['sorts']);
        }

        $announcement = $this->announcementRepo->paginate($data['per_page']);
        $this->announcementRepo->resetRepository(); 

        return $announcement;
    }

}
