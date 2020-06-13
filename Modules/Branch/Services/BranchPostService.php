<?php

namespace Modules\Branch\Services;

use App\Services\Abstracts\CrudPostAbstract;
use Illuminate\Database\Eloquent\Model;
use Modules\Branch\Models\Branch;
use Modules\Branch\Repositories\Interfaces\BranchRepositoryInterface;

/**
 * Class BranchPostService
 * @package Modules\Branch\Services
 */
class BranchPostService extends CrudPostAbstract {

    /**
     * BranchPostService constructor.
     * @param BranchRepositoryInterface $branchRepo
     */
    public function __construct(BranchRepositoryInterface $branchRepo) {
        $this->repo = $branchRepo;
    }

    /**
     * @param array $data
     * @return Model|Branch|null
     */
    public function create(array $data) : ?Branch {
        $response = parent::create($data);
        $response->load('company');
        $response->load('label');

        return $response;
    }
}
