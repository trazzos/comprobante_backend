<?php
namespace Modules\Action\Repositories\Interfaces;

use App\Repositories\Interfaces\RepositoryInterface;

/**
 * Interface ActionRepositoryInterface
 * @package Modules\Action\Repositories\Interfaces
 */
interface ActionRepositoryInterface extends RepositoryInterface {
    /**
     * @return mixed
     */
    public function model();
}
