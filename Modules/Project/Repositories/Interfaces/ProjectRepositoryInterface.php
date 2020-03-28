<?php
namespace Modules\Project\Repositories\Interfaces;

use App\Repositories\Interfaces\RepositoryInterface;

/**
 * Interface ProjectRepositoryInterface
 * @package Modules\Project\Repositories\Interfaces
 */
interface ProjectRepositoryInterface extends RepositoryInterface {
    /**
     * @return mixed
     */
    public function model();
}