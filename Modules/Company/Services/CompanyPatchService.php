<?php

namespace Modules\Company\Services;

use App\Services\Abstracts\CrudPatchAbstract;
use Illuminate\Database\Eloquent\Model;
use Modules\Company\Models\Company;
use Modules\Company\Repositories\Interfaces\CompanyRepositoryInterface;
use Modules\User\Models\User;

/**
 * Class CompanyPatchService
 * @package Modules\Company\Services
 */
class CompanyPatchService extends CrudPatchAbstract {

    /**
     * CompanyPatchService constructor.
     * @param CompanyRepositoryInterface $companyRepo
     */
    public function __construct(CompanyRepositoryInterface $companyRepo) {
        $this->repo = $companyRepo;
    }

    /**
     * @param array $data
     * @return Model|Company|null
     */
    public function update(User $user, array $data) : ?Company {
        $response =  parent::update($user, $data);
        $response->load('branch');
        return $response;
    }
}
