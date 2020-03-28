<?php
namespace Modules\Setting\Repositories\Interfaces;

use App\Repositories\Interfaces\RepositoryInterface;

/**
 * Interface AwardTypeRepositoryInterface
 * @package Modules\Setting\Repositories\Interfaces
 */
interface AwardTypeRepositoryInterface extends RepositoryInterface {
    /**
     * @return mixed
     */
    public function model();
}
