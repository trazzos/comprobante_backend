<?php

namespace Modules\Task\Services;

use Modules\Task\Models\Task;
use Modules\Task\Repositories\Interfaces\TaskRepositoryInterface;

/**
 * Class TaskCreateService
 * @package Modules\Task\Services
 */
class TaskCreateService {
    /**
     * @var TaskRepositoryInterface
     */
    private $taskRepo;

    /**
     * TaskCreateService constructor.
     * @param TaskRepositoryInterface $taskRepo
     */
    public function __construct(TaskRepositoryInterface $taskRepo) {
        $this->taskRepo = $taskRepo;
    }

    /**
     * @param array $data
     * @return Task|null
     */
    public function create(array $data) : ? Task {
        return $this->taskRepo->create($data);
    }
}
