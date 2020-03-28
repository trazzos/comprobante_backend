<?php
namespace Modules\User\Repositories\Interfaces;

use App\Repositories\Interfaces\RepositoryInterface;

/**
 * Interface UserRepositoryInterface
 * @package Modules\User\Repositories\Interfaces
 */
interface UserRepositoryInterface extends RepositoryInterface {
    /**
     * @return mixed
     */
    public function model();
}