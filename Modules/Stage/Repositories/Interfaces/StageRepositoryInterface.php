<?php
namespace Modules\Stage\Repositories\Interfaces;

use App\Repositories\Interfaces\RepositoryInterface;

/**
 * Interface StageRepositoryInterface
 * @package Modules\Stage\Repositories\Interfaces
 */
interface StageRepositoryInterface extends RepositoryInterface {
    /**
     * @return mixed
     */
    public function model();
}
