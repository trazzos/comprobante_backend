<?php

namespace Modules\Company\Services;

use Modules\Company\Models\Company;
use Modules\Company\Repositories\Interfaces\CompanyRepositoryInterface;

/**
 * Class CompanyCreateService
 * @package Modules\Company\Services
 */
class CompanyCreateService {
    /**
     * @var CompanyRepositoryInterface
     */
    private $companyRepo;

    /**
     * CompanyCreateService constructor.
     * @param CompanyRepositoryInterface $companyRepo
     */
    public function __construct(CompanyRepositoryInterface $companyRepo) {
        $this->companyRepo = $companyRepo;
    }

    /**
     * @param array $data
     * @return Company|null
     */
    public function create(array $data) : ?Company {
        return $this->companyRepo->create($data);
    }
}
