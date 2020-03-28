<?php

namespace Modules\Stage\Services;

use Modules\Stage\Models\Stage;
use Modules\Stage\Repositories\Interfaces\StageRepositoryInterface;

/**
 * Class StageCreateService
 * @package Modules\Stage\Services
 */
class StageCreateService {
    /**
     * @var StageRepositoryInterface
     */
    private $stageRepo;

    /**
     * StageCreateService constructor.
     * @param StageRepositoryInterface $stageRepo
     */
    public function __construct(StageRepositoryInterface $stageRepo) {
        $this->stageRepo = $stageRepo;
    }

    /**
     * @param array $data
     * @return Stage|null
     */
    public function create(array $data) : ? Stage {
        return $this->stageRepo->create($data);
    }
}
