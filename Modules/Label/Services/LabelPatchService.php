<?php

namespace Modules\Label\Services;

use Modules\Label\Repositories\Interfaces\LabelRepositoryInterface;
use Modules\Label\Models\Label;
use Modules\User\Models\User;
use ThrowException;

/**
 * Class LabelPatchService
 * @package Modules\Label\Services
 */
class LabelPatchService {
    /**
     * @var LabelRepositoryInterface
     */
    private $labelRepo;

    /**
     * LabelPatchService constructor.
     * @param LabelRepositoryInterface $labelRepo
     */
    public function __construct(LabelRepositoryInterface $labelRepo) {
        $this->labelRepo = $labelRepo;
    }
    /**
     * @param User $user
     * @param array $data
     * @return Label|null
     */
    public function update(array $data) : ?Label {
        $lab =  $this->labelRepo->updateAndReturn($data, $data["id"]);
        return $lab->load('invoiceType');
    }
}
