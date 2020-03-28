<?php
namespace Modules\Company\Repositories\Interfaces;

use App\Repositories\Interfaces\RepositoryInterface;

/**
 * Interface CompanyRepositoryInterface
 * @package Modules\Company\Repositories\Interfaces
 */
interface CompanyRepositoryInterface extends RepositoryInterface {
    /**
     * @return mixed
     */
    public function model();
}