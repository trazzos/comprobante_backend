<?php

namespace Modules\Project\Services;

use Modules\Project\Models\Project;
use Modules\Project\Repositories\Interfaces\ProjectRepositoryInterface;

/**
 * Class ProjectCreateService
 * @package Modules\Project\Services
 */
class ProjectCreateService {
    /**
     * @var ProjectRepositoryInterface
     */
    private $projectRepo;

    /**
     * ProjectCreateService constructor.
     * @param ProjectRepositoryInterface $projectRepo
     */
    public function __construct(ProjectRepositoryInterface $projectRepo) {
        $this->projectRepo = $projectRepo;
    }

    /**
     * @param array $data
     * @return Project|null
     */
    public function create(array $data) : ?Project {
        return $this->projectRepo->create($data);
    }
}
