<?php

namespace Modules\Branch\Services;

use App\Services\Abstracts\CrudDeleteAbstract;
use Modules\Branch\Repositories\Interfaces\BranchRepositoryInterface;

/**
 * Class BranchDeleteService
 * @package Modules\Branch\Services
 */
class BranchDeleteService  extends CrudDeleteAbstract {

    /**
     * BranchDeleteService constructor.
     * @param BranchRepositoryInterface $branchRepo
     */
    public function __construct(BranchRepositoryInterface $branchRepo) {
        $this->repo = $branchRepo;
    }
}
