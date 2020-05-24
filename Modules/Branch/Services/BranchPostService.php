<?php

namespace Modules\Branch\Services;

use Modules\Branch\Models\Branch;
use Modules\Branch\Repositories\Interfaces\BranchRepositoryInterface;

/**
 * Class BranchPostService
 * @package Modules\Branch\Services
 */
class BranchPostService {
    /**
     * @var BranchRepositoryInterface
     */
    private $branchRepo;

    /**
     * BranchPostService constructor.
     * @param BranchRepositoryInterface $branchRepo
     */
    public function __construct(BranchRepositoryInterface $branchRepo) {
        $this->branchRepo = $branchRepo;
    }

    /**
     * @param array $data
     * @return Branch|null
     */
    public function create(array $data) : ? Branch {
        $lab =  $this->branchRepo->create($data);
        return $lab->load('company');
    }
}
