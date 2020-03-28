<?php

namespace Modules\Company\Repositories\Implementation;
use App\Repositories\Implementation\BaseRepository;
use Modules\Company\Models\Company;
use Modules\Company\Repositories\Interfaces\CompanyRepositoryInterface;


/**
 * Class CompanyRepository
 * @package Modules\Company\Repositories\Implementation
 */
class CompanyRepository extends BaseRepository implements CompanyRepositoryInterface {
    /**
     * @return string
     */
    public function model() : string {
        return Company::class;
    }
}