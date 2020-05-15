<?php
namespace Modules\Label\Repositories\Interfaces;

use App\Repositories\Interfaces\RepositoryInterface;

/**
 * Interface LabelRepositoryInterface
 * @package Modules\Label\Repositories\Interfaces
 */
interface LabelRepositoryInterface extends RepositoryInterface {
    /**
     * @return mixed
     */
    public function model();
}
