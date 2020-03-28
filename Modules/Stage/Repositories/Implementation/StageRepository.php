<?php

namespace Modules\Stage\Repositories\Implementation;
use App\Repositories\Implementation\BaseRepository;
use Modules\Stage\Models\Stage;
use Modules\Stage\Repositories\Interfaces\StageRepositoryInterface;


/**
 * Class StageRepository
 * @package Modules\Stage\Repositories\Implementation
 */
class StageRepository extends BaseRepository implements StageRepositoryInterface {
    /**
     * @return string
     */
    public function model() : string {
        return Stage::class;
    }
}
