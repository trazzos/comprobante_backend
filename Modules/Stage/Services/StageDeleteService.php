<?php

namespace Modules\Stage\Services;

use Modules\Stage\Repositories\Interfaces\StageRepositoryInterface;

/**
 * Class StageDeleteService
 * @package Modules\Stage\Services
 */
class StageDeleteService {
    /**
     * @var StageRepositoryInterface
     */
    private $stageRepo;

    /**
     * StageDeleteService constructor.
     * @param StageRepositoryInterface $stageRepo
     */
    public function __construct(StageRepositoryInterface $stageRepo) {
        $this->stageRepo = $stageRepo;
    }

    /**
     * @param $id
     * @return false|true
     */
    public function delete($id): ? bool {
        return $this->stageRepo->delete($id);
    }
}
