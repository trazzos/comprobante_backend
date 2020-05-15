<?php

namespace Modules\Label\Services;

use Modules\Label\Repositories\Interfaces\LabelRepositoryInterface;

/**
 * Class LabelDeleteService
 * @package Modules\Label\Services
 */
class LabelDeleteService {
    /**
     * @var LabelRepositoryInterface
     */
    private $labelRepo;

    /**
     * LabelDeleteService constructor.
     * @param LabelRepositoryInterface $labelRepo
     */
    public function __construct(LabelRepositoryInterface $labelRepo) {
        $this->labelRepo = $labelRepo;
    }

    /**
     * @param $id
     * @return false|true
     */
    public function delete($id): ? bool {
        return $this->labelRepo->delete($id);
    }
}
