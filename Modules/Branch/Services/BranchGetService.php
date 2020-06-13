<?php

namespace Modules\Branch\Services;

use App\Services\Abstracts\CrudGetService;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Branch\Repositories\Interfaces\BranchRepositoryInterface;

/**
 * Class BranchGetService
 * @package Modules\Branch\Services
 */
class BranchGetService extends CrudGetService {
    /**
     * BranchGetService constructor.
     * @param BranchRepositoryInterface $branchRepo
     */
    public function __construct(BranchRepositoryInterface $branchRepo) {
        $this->repo = $branchRepo;
    }

    /**
     * @param array $data
     * @return LengthAwarePaginator|null
     */
    public function list(array $data) : ?LengthAwarePaginator {
        $response = parent::list($data);
        $response->load('company');
        $response->load('label');

        return $response;
    }
}
