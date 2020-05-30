<?php

namespace Modules\Label\Services;

use App\Services\Abstracts\CrudDeleteAbstract;
use Modules\Label\Repositories\Interfaces\LabelRepositoryInterface;

/**
 * Class LabelDeleteService
 * @package Modules\Label\Services
 */
class LabelDeleteService extends CrudDeleteAbstract {
    /**
     * LabelDeleteService constructor.
     * @param LabelRepositoryInterface $labelRepo
     */
    public function __construct(LabelRepositoryInterface $labelRepo) {
        $this->repo = $labelRepo;
    }
}
