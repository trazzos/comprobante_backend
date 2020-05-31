<?php

namespace Modules\Company\Services;

use App\Services\Abstracts\CrudPostAbstract;
use Modules\Company\Repositories\Interfaces\CompanyRepositoryInterface;

/**
 * Class CompanyPostService
 * @package Modules\Company\Services
 */
class CompanyPostService extends CrudPostAbstract {

    /**
     * CompanyPostService constructor.
     * @param CompanyRepositoryInterface $companyRepo
     */
    public function __construct(CompanyRepositoryInterface $companyRepo) {
        $this->repo = $companyRepo;
    }
}
