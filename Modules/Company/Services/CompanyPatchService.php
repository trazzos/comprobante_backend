<?php

namespace Modules\Company\Services;

use Modules\Company\Models\Company;
use Modules\Company\Repositories\Interfaces\CompanyRepositoryInterface;

/**
 * Class CompanyPatchService
 * @package Modules\Company\Services
 */
class CompanyPatchService {
    /**
     * @var CompanyRepositoryInterface
     */
    private $companyRepo;

    /**
     * CompanyPatchService constructor.
     * @param CompanyRepositoryInterface $companyRepo
     */
    public function __construct(CompanyRepositoryInterface $companyRepo) {
        $this->companyRepo = $companyRepo;
    }

    /**
     * @param $data information to update
     * @param $id register identifier that will be updated
     * @return false|true
     */
    public function update(array $data, $id) : ?Company {
        $company = $this->companyRepo->updateAndReturn($data,$id);
        return $company;
    }
}
