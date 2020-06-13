<?php

namespace Modules\Branch\Services;

use App\Services\Abstracts\CrudPatchAbstract;
use Illuminate\Database\Eloquent\Model;
use Modules\Branch\Repositories\Interfaces\BranchRepositoryInterface;
use Modules\Branch\Models\Branch;

/**
 * Class BranchPatchService
 * @package Modules\Branch\Services
 */
class BranchPatchService extends CrudPatchAbstract {

    /**
     * BranchPatchService constructor.
     * @param BranchRepositoryInterface $branchRepo
     */
    public function __construct(BranchRepositoryInterface $branchRepo) {
        $this->repo = $branchRepo;
    }

    /**
     * @param array $data
     * @return Model|Branch|null
     */
    public function update(array $data) : ?Branch {
        $response =  parent::update($data);
        $response->load('company');
        $response->load('label');

        return $response;
    }
}
