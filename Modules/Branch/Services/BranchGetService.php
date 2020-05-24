<?php

namespace Modules\Branch\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Branch\Repositories\Interfaces\BranchRepositoryInterface;
use ThrowException;
use Filter;
use Sort;

/**
 * Class BranchGetService
 * @package Modules\Branch\Services
 */
class BranchGetService {
    /**
     * @var BranchRepositoryInterface
     */
    private $branchRepo;

    /**
     * BranchGetService constructor.
     * @param BranchRepositoryInterface $branchRepo
     */
    public function __construct(BranchRepositoryInterface $branchRepo) {
        $this->branchRepo = $branchRepo;
    }
    /**
     * @param array $data
     * @return LengthAwarePaginator|null
     */
    public function list(array $data) : ?LengthAwarePaginator {
        if(isset($data['predicates'])) {
            Filter::apply(__NAMESPACE__, $this->branchRepo, $data['predicates']);
        }

        if(isset($data['sorts'])) {
            Sort::apply(__NAMESPACE__, $this->branchRepo, $data['sorts']);
        }
        $branchs = $this->branchRepo->paginate($data['per_page']);
        $branchs->load('company');
        $branchs->load('label');
        $this->branchRepo->resetRepository();

        if(!$branchs) {
            ThrowException::notFound();
        }

        return $branchs;
    }
}
