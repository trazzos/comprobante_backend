<?php
namespace Modules\Branch\Repositories\Interfaces;

use App\Repositories\Interfaces\RepositoryInterface;

/**
 * Interface BranchRepositoryInterface
 * @package Modules\Branch\Repositories\Interfaces
 */
interface BranchRepositoryInterface extends RepositoryInterface {
    /**
     * @return mixed
     */
    public function model();
}
