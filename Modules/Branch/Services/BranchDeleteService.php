<?php

namespace Modules\Branch\Services;

use Modules\Branch\Repositories\Interfaces\BranchRepositoryInterface;

/**
 * Class BranchDeleteService
 * @package Modules\Branch\Services
 */
class BranchDeleteService {
    /**
     * @var BranchRepositoryInterface
     */
    private $branchRepo;

    /**
     * BranchDeleteService constructor.
     * @param BranchRepositoryInterface $branchRepo
     */
    public function __construct(BranchRepositoryInterface $branchRepo) {
        $this->branchRepo = $branchRepo;
    }

    /**
     * @param $id
     * @return false|true
     */
    public function delete($id): ? bool {
        return $this->branchRepo->delete($id);
    }
}
