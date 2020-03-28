<?php
namespace Modules\Announcement\Repositories\Interfaces;

use App\Repositories\Interfaces\RepositoryInterface;

/**
 * Interface AnnouncementRepositoryInterface
 * @package Modules\Announcement\Repositories\Interfaces
 */
interface AnnouncementRepositoryInterface extends RepositoryInterface {
    /**
     * @return mixed
     */
    public function model();
}
