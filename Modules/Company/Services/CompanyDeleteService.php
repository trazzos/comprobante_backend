<?php

namespace Modules\Company\Services;

use App\Services\Abstracts\CrudDeleteAbstract;
use Modules\Company\Repositories\Interfaces\CompanyRepositoryInterface;

/**
 * Class CompanyDeleteService
 * @package Modules\Company\Services
 */
class CompanyDeleteService extends CrudDeleteAbstract {

    /**
     * CompanyDeleteService constructor.
     * @param CompanyRepositoryInterface $companyRepo
     */
    public function __construct(CompanyRepositoryInterface $companyRepo) {
        $this->repo = $companyRepo;
    }
}
