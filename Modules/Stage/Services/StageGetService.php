<?php

namespace Modules\Stage\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Stage\Repositories\Interfaces\StageRepositoryInterface;
use ThrowException;
use Filter;
use Sort;

/**
 * Class StageGetService
 * @package Modules\Stage\Services
 */
class StageGetService {
    /**
     * @var StageRepositoryInterface
     */
    private $stageRepo;

    /**
     * StageGetService constructor.
     * @param StageRepositoryInterface $stageRepo
     */
    public function __construct(StageRepositoryInterface $stageRepo) {
        $this->stageRepo = $stageRepo;
    }
    /**
     * @param array $data
     * @return LengthAwarePaginator|null
     */
    public function list(array $data) : ?LengthAwarePaginator {
        if(isset($data['predicates'])) {
            Filter::apply(__NAMESPACE__, $this->stageRepo, $data['predicates']);
        }

        if(isset($data['sorts'])) {
            Sort::apply(__NAMESPACE__, $this->stageRepo, $data['sorts']);
        }
        $stages = $this->stageRepo->paginate($data['per_page']);
        $stages->load('task');
        $this->stageRepo->resetRepository();

        if(!$stages) {
            ThrowException::notFound();
        }

        return $stages;
    }
}
