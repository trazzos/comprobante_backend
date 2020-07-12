<?php

namespace Modules\Company\Services;

use App\Services\Abstracts\CrudGetService;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Company\Repositories\Interfaces\CompanyRepositoryInterface;
/**
 * Class CompanyGetService
 * @package Modules\Company\Services
 */
class CompanyGetService extends CrudGetService {

    /**
     * CompanyGetService constructor.
     * @param CompanyRepositoryInterface $companyRepo
     */
    public function __construct(CompanyRepositoryInterface $companyRepo) {
        $this->repo = $companyRepo;
        $this->nameSpace = __NAMESPACE__;
    }

    /**
     * @param array $data
     * @return LengthAwarePaginator|null
     */
    public function list(array $data) : ?LengthAwarePaginator {
        $response = parent::list($data);
        $response->load('branch');

        return $response;
    }
}
