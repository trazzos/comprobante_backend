<?php

namespace Modules\Branch\Repositories\Implementation;
use App\Repositories\Implementation\BaseRepository;
use Modules\Branch\Models\Branch;
use Modules\Branch\Repositories\Interfaces\BranchRepositoryInterface;


/**
 * Class BranchRepository
 * @package Modules\Branch\Repositories\Implementation
 */
class BranchRepository extends BaseRepository implements BranchRepositoryInterface {
    /**
     * @return string
     */
    public function model() : string {
        return Branch::class;
    }
}
