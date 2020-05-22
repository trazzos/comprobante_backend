<?php

namespace Modules\Label\Services;

use Modules\Label\Models\Label;
use Modules\Label\Repositories\Interfaces\LabelRepositoryInterface;

/**
 * Class LabelPostService
 * @package Modules\Label\Services
 */
class LabelPostService {
    /**
     * @var LabelRepositoryInterface
     */
    private $labelRepo;

    /**
     * LabelPostService constructor.
     * @param LabelRepositoryInterface $labelRepo
     */
    public function __construct(LabelRepositoryInterface $labelRepo) {
        $this->labelRepo = $labelRepo;
    }

    /**
     * @param array $data
     * @return Label|null
     */
    public function create(array $data) : ? Label {
        $lab =  $this->labelRepo->create($data);
        return $lab->load('invoiceType');
    }
}
