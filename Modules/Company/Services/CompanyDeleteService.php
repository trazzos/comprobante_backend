<?php

namespace Modules\Company\Services;

use Modules\Company\Models\Company;
use Modules\Company\Repositories\Interfaces\CompanyRepositoryInterface;

/**
 * Class CompanyDeleteService
 * @package Modules\Company\Services
 */
class CompanyDeleteService {
    /**
     * @var CompanyRepositoryInterface
     */
    private $companyRepo;

    /**
     * CompanyDeleteService constructor.
     * @param CompanyRepositoryInterface $companyRepo
     */
    public function __construct(CompanyRepositoryInterface $companyRepo) {
        $this->companyRepo = $companyRepo;
    }

    /**
     * @param $id
     * @return false|true
     */
    public function delete($id): ? bool {
        return $this->companyRepo->delete($id);
    }
}
