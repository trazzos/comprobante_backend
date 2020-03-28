<?php

namespace Modules\Task\Repositories\Implementation;
use App\Repositories\Implementation\BaseRepository;
use Modules\Task\Models\Task;
use Modules\Task\Repositories\Interfaces\TaskRepositoryInterface;


/**
 * Class TaskRepository
 * @package Modules\Task\Repositories\Implementation
 */
class TaskRepository extends BaseRepository implements TaskRepositoryInterface {
    /**
     * @return string
     */
    public function model() : string {
        return Task::class;
    }
}
