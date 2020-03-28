<?php

namespace Modules\Task\Services;

use Modules\Task\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Support\Collection;


/**
 * Class TaskGetService
 * @package Modules\Task\Services
 */
class TaskGetService {
    /**
     * @var TaskRepositoryInterface
     */
    private $taskRepo;

    /**
     * TaskGetService constructor.
     * @param TaskRepositoryInterface $taskRepo
     */
    public function __construct(TaskRepositoryInterface $taskRepo) {
        $this->taskRepo = $taskRepo;
    }

    /**
     * @return Collection|null
     */
    public function list() : ?Collection {
        return $this->taskRepo->all();
    }
}
