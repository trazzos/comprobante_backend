<?php
namespace Modules\AnnouncementType\Repositories\Interfaces;

use App\Repositories\Interfaces\RepositoryInterface;

/**
 * Interface AnnouncementTypeRepositoryInterface
 * @package Modules\AnnouncementType\Repositories\Interfaces
 */
interface AnnouncementTypeRepositoryInterface extends RepositoryInterface {
    /**
     * @return mixed
     */
    public function model();
}