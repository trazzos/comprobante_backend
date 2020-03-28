<?php

namespace Modules\Task\Services;

use Modules\Task\Models\Task;
use Modules\User\Models\User;
use Modules\Task\Repositories\Interfaces\TaskRepositoryInterface;
use ThrowException;

/**
 * Class TaskPatchService
 * @package Modules\Task\Services
 */
class TaskPatchService {
    /**
     * @var TaskRepositoryInterface
     */
    private $taskRepo;

    /**
     * TaskPatchService constructor.
     * @param TaskRepositoryInterface $taskRepo
     */
    public function __construct(TaskRepositoryInterface $taskRepo) {
        $this->taskRepo = $taskRepo;
    }

    /**
     * @param User $user
     * @param array $data
     * @return Stage|null
     */
    public function update(User $user, array $data): ?Task {
         $data = $this->normalizeData($user, $data);
         return $this->taskRepo->updateAndReturn($data,$data['id']);
    }
    /**
     * @param User $user
     * @param array $data
     * @return array
     */
    private function normalizeData(User $user, array $data) {
        return $data;
    }
}
