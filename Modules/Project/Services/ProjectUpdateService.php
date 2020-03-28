<?php

namespace Modules\Project\Services;

use Modules\Project\Models\Project;
use Modules\Project\Repositories\Interfaces\ProjectRepositoryInterface;

/**
 * Class ProjectUpdateService
 * @package Modules\Project\Services
 */
class ProjectUpdateService {
    /**
     * @var ProjectRepositoryInterface
     */
    private $projectRepo;

    /**
     * ProjectUpdateService constructor.
     * @param ProjectRepositoryInterface $projectRepo
     */
    public function __construct(ProjectRepositoryInterface $projectRepo) {
        $this->projectRepo = $projectRepo;
    }

    /**
     * @param array $data
     * @return Project|null
     */
    public function update(User $user, array $data) : ?Project {
        $data = $this->normalizeData($user, $data);

        return $this->projectRepo->updateAndReturn($data, $data["id"]);
    }

    /**
     * @param User $user
     * @param array $data
     * @return array
     */
    private function normalizeData(User $user, array $data) {
        $data['user_id'] = $user['id'];

        return $data;
    }

}
