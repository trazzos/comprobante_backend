<?php

namespace Modules\Project\Services;

use Modules\Project\Models\Project;
use Modules\Project\Repositories\Interfaces\ProjectRepositoryInterface;

/**
 * Class ProjectDeleteService
 * @package Modules\Project\Services
 */
class ProjectDeleteService {
    /**
     * @var ProjectRepositoryInterface
     */
    private $projectRepo;

    /**
     * ProjectGetService constructor.
     * @param ProjectRepositoryInterface $projectRepo
     */
    public function __construct(ProjectRepositoryInterface $projectRepo) {
        $this->projectRepo = $projectRepo;
    }

    /**
     * @param $id
     * @return Project|null
     */
    public function delete($id) : ?Project {
        $this->projectRepo->delete($id);
        return null;
    }
}
