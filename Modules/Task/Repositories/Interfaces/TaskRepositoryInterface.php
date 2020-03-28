<?php
namespace Modules\Task\Repositories\Interfaces;

use App\Repositories\Interfaces\RepositoryInterface;

/**
 * Interface TaskRepositoryInterface
 * @package Modules\Task\Repositories\Interfaces
 */
interface TaskRepositoryInterface extends RepositoryInterface {
    /**
     * @return mixed
     */
    public function model();
}
