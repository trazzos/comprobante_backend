<?php

namespace Modules\Branch\Services;

use Modules\Branch\Repositories\Interfaces\BranchRepositoryInterface;
use Modules\Branch\Models\Branch;
use Modules\User\Models\User;
use ThrowException;

/**
 * Class BranchPatchService
 * @package Modules\Branch\Services
 */
class BranchPatchService {
    /**
     * @var BranchRepositoryInterface
     */
    private $branchRepo;

    /**
     * BranchPatchService constructor.
     * @param BranchRepositoryInterface $branchRepo
     */
    public function __construct(BranchRepositoryInterface $branchRepo) {
        $this->branchRepo = $branchRepo;
    }
    /**
     * @param User $user
     * @param array $data
     * @return Branch|null
     */
    public function update(array $data) : ?Branch {
        $lab =  $this->branchRepo->updateAndReturn($data, $data["id"]);
        return $lab->load('company');
    }
}
