<?php

namespace Modules\Project\Repositories\Implementation;
use App\Repositories\Implementation\BaseRepository;
use Modules\Project\Models\Project;
use Modules\Project\Repositories\Interfaces\ProjectRepositoryInterface;


/**
 * Class ProjectRepository
 * @package Modules\Project\Repositories\Implementation
 */
class ProjectRepository extends BaseRepository implements ProjectRepositoryInterface {
    /**
     * @return string
     */
    public function model() : string {
        return Project::class;
    }
}