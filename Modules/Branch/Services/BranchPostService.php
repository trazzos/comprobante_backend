<?php

namespace Modules\Branch\Services;

use App\Services\Abstracts\CrudPostAbstract;
use Illuminate\Database\Eloquent\Model;
use Modules\Branch\Models\Branch;
use Modules\User\Models\User;
use Modules\Branch\Repositories\Interfaces\BranchRepositoryInterface;
use Auth;

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
        $data = $this->normalizeData($data, Auth::getUser());
        $response = parent::create($data);
        $response->load('company');
        $response->load('label');

        return $response;
    }

    /*
     * @param array $data
     * @return array;
     */
    public function normalizeData(array $data, User $user) :array {
        $extra = [
            'user_id' => $user->user_id,
            'company_id' => $user->company_id
        ];
        return array_merge($data, $extra);
    }
}
